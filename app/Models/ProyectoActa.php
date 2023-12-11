<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoActa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proyecto_acta';
    protected $primaryKey = 'proyecto_acta_id';
    protected $fillable = [
        'proyecto_acta_id',
        'proyecto_acta_codigo',
        'proyecto_acta_path',
        'proyecto_acta_estado',
        'proyecto_id',
        'acta_id'
    ];

    public function proyecto(): BelongsTo {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function acta(): BelongsTo {
        return $this->belongsTo(Acta::class, 'acta_id');
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
