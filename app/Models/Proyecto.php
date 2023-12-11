<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proyecto';
    protected $primaryKey = 'proyecto_id';
    protected $fillable = [
        'proyecto_id',
        'proyecto_resolucion_asesor_path',
        'proyecto_resolucion_jurado_path',
        'proyecto_anexo_path',
        'proyecto_grupal',
        'proyecto_aprobacion',
        'proyecto_final_aprobacion',
        'proyecto_estado',
        'asesor_id',
        'proceso_id',
        'lineas_investigacion_id'
    ];

    public function proceso(): BelongsTo {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }

    public function asesor(): BelongsTo {
        return $this->belongsTo(Docente::class, 'asesor_id', 'docente_id');
    }

    public function lineas_investigacion(): BelongsTo {
        return $this->belongsTo(LineasInvestigacion::class, 'lineas_investigacion_id');
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
