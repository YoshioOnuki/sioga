<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proyecto_file';
    protected $primaryKey = 'proyecto_file_id';
    protected $fillable = [
        'proyecto_file_id',
        'proyecto_file_path]',
        'proyecto_file_estado',
        'proceso_id',
        'proyecto_id',
        'tipo_proyecto_id'
    ];

    public function proceso(): BelongsTo {
        return $this->belongsTo(Proceso::class, 'proceso_id');
    }

    public function proyecto(): BelongsTo {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

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
