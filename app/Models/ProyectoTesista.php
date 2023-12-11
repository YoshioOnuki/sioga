<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyectoTesista extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'proyecto_tesista';
    protected $primaryKey = 'proyecto_tesista_id';
    protected $fillable = [
        'proyecto_tesista_id',
        'proyecto_tesista_estado',
        'proyecto_id',
        'tesista_id',
    ];

    public function proyecto(): BelongsTo {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function tesista(): BelongsTo {
        return $this->belongsTo(Tesista::class, 'tesista_id');
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
