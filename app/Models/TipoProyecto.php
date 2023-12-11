<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProyecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_proyecto';
    protected $primaryKey = 'tipo_proyecto_id';
    protected $fillable = [
        'tipo_proyecto_id',
        'tipo_proyecto_nombre',
        'tipo_proyecto_estado',
        'tipo_grado_academico_id',
    ];

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
