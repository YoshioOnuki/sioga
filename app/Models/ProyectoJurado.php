<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoJurado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proyecto_jurado';
    protected $primaryKey = 'proyecto_jurado_id';
    protected $fillable = [
        'proyecto_jurado_id',
        'proyecto_jurado_estado',
        'proyecto_id',
        'docente_id',
        'tipo_jurado_id'
    ];

    public function proyecto(): BelongsTo {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function docente(): BelongsTo {
        return $this->belongsTo(Docente::class, 'docente_id');
    }

    public function tipo_jurado(): BelongsTo {
        return $this->belongsTo(TipoJurado::class, 'tipo_jurado_id');
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
}
