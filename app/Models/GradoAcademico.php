<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradoAcademico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'grado_academico';
    protected $primaryKey = 'grado_academico_id';
    protected $fillable = [
        'grado_academico_id',
        'grado_academico_nombre',
        'grado_academico_estado'
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
