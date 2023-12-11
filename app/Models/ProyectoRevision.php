<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoRevision extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'acta';
    protected $primaryKey = 'acta_id';
    protected $fillable = [
        'acta_id',
        'acta_nombre',
        'acta_estado',
        'tipo_proyecto_id',
    ];

    public function tipo_proyecto(): BelongsTo {
        return $this->belongsTo(TipoProyecto::class, 'tipo_proyecto_id');
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
