<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Persona extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'persona';
    protected $primaryKey = 'persona_id';
    protected $fillable = [
        'persona_id',
        'persona_documento',
        'persona_apellido_paterno',
        'persona_apellido_materno',
        'persona_nombres',
        'persona_estado',
        'tipo_documento_id',
        'genero_id',
        'grado_academico_id',
        'ubigeo_id',
    ];

    public function tipo_documento(): BelongsTo {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function genero(): BelongsTo {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function grado_academico(): BelongsTo {
        return $this->belongsTo(GradoAcademico::class, 'grado_academico_id');
    }

    public function ubigeo(): BelongsTo {
        return $this->belongsTo(Ubigeo::class, 'ubigeo_id');
    }

    public function docente(): HasMany {
        return $this->hasMany(Docente::class, 'persona_id');
    }

    public function tesista(): HasMany {
        return $this->hasMany(Tesista::class, 'persona_id');
    }

    public function usuario() {
        return $this->hasOne(Usuario::class, 'persona_id');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });

        static::deleting(function ($model) {
            if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($model))) {
                $model->deleted_by = auth()->id();
                $model->save();
            }
        });
    }

    public function getNombreCompletoAttribute(): string {
        if ($this->persona_apellido_paterno == null && $this->persona_apellido_mateno == null) {
            return $this->persona_nombres;
        }
        return $this->persona_apellido_paterno . ' ' . $this->persona_apellido_materno . ', ' . $this->persona_nombres;
    }

    public function getSoloPrimerosNombresAttribute(): string {
        $nombres = explode(' ', $this->persona_nombres);
        return $nombres[0] . ' ' . $this->persona_apellido_paterno;
    }

    public function getAvatarAttribute(): string {
        return $this->usuario->usuario_avatar ?? 'https://ui-avatars.com/api/?name=' . $this->solo_primeros_nombres . '&size=64&&color=FFFFFF&background=0ea5e9&bold=true';
    }

    public function es_tesista(): bool {
        return $this->tesista->count() > 0;
    }

    public function es_docente(): bool {
        return $this->docente->count() > 0;
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = auth()->id();
            $model->save();
        });
    }

    public function scopeSearch($query, $search) {
        if ($search == null) {
            return $query;
        }
        return $query->where('persona_documento', 'LIKE', '%' . $search . '%')
            ->orWhere('persona_apellido_paterno', 'LIKE', '%' . $search . '%')
            ->orWhere('persona_apellido_materno', 'LIKE', '%' . $search . '%')
            ->orWhere('persona_nombres', 'LIKE', '%' . $search . '%')
            ->orWhere(DB::raw('CONCAT(persona_apellido_paterno, " ", persona_apellido_materno, ", ", persona_nombres)'), 'LIKE', '%' . $search . '%' );
    }
}
