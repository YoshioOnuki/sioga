<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineasInvestigacion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'lineas_investigacion';
    protected $primaryKey = 'lineas_investigacion_id';
    protected $fillable = [
        'lineas_investigacion_id',
        'lineas_investigacion_nombre',
        'lineas_investigacion_estado',
        'programa_id',
    ];

    public function programa(): BelongsTo {
        return $this->belongsTo(Programa::class, 'programa_id');
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
