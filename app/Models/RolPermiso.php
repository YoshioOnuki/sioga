<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolPermiso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rol_permiso';
    protected $primaryKey = 'rol_permiso_id';
    protected $fillable = [
        'rol_permiso_id',
        'rol_id',
        'permiso_id'
    ];

    public function rol(): BelongsTo {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function permiso(): BelongsTo {
        return $this->belongsTo(Permiso::class, 'permiso_id');
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
