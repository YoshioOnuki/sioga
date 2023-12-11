<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoGradoAcademico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_grado_academico';
    protected $primaryKey = 'tipo_grado_academico_id';
    protected $fillable = [
        'tipo_grado_academico_id',
        'tipo_grado_academico_nombre',
        'tipo_grado_academico_estado'
    ];

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
