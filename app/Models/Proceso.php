<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proceso';
    protected $primaryKey = 'proceso_id';
    protected $fillable = [
        'process_id',
        'proceso_numero',
        'process_nombre',
        'proceso_tiempo',
        'proceso_estado',
        'tipo_tiempo_id',
        'tipo_grado_academico_id',
    ];

    public function tipo_tiempo(): BelongsTo {
        return $this->belongsTo(TipoTiempo::class, 'tipo_tiempo_id');
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
