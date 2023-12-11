<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocenteLineasInvestigacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'docente_lineas_investigacion';
    protected $primaryKey = 'docente_lineas_investigacion_id';
    protected $fillable = [
        'docente_lineas_investigacion_id',
        'docente_id',
        'lineas_investigacion_id',
        'docente_lineas_investigacion_estado'
    ];

    public function docente(): BelongsTo {
        return $this->belongsTo(Docente::class, 'docente_id');
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
