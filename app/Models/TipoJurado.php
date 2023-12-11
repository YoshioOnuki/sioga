<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoJurado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tipo_jurado';
    protected $primaryKey = 'tipo_jurado_id';
    protected $fillable = [
        'tipo_jurado_id',
        'tipo_jurado_nombre',
        'tipo_jurado_nivel',
        'tipo_jurado_estado',
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
