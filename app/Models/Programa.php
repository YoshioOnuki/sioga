<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'programa';
    protected $primaryKey = 'programa_id';
    protected $fillable = [
        'programa_id',
        'programa_abreviacion',
        'programa_tipo',
        'progrma_nombre',
        'programa_mencion',
        'programa_estado',
        'sunedu_id',
        'sunedu_codigo',
        'sede_id',
        'facultad_id',
        'tipo_grado_academico_id',
    ];

    public function sede(): BelongsTo {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function facultad(): BelongsTo {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function tipo_grado_academico(): BelongsTo {
        return $this->belongsTo(TipoGradoAcademico::class, 'tipo_grado_academico_id');
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
