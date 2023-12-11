<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'rol';
    protected $primaryKey = 'rol_id';
    protected $fillable = [
        'rol_id',
        'rol_nombre',
        'rol_estado'
    ];

    public function rol_permisos(): HasMany {
        return $this->hasMany(RolPermiso::class, 'rol_id');
    }

    public function usuarios(): HasMany {
        return $this->hasMany(Usuario::class, 'rol_id');
    }

    public function permisos(): BelongsToMany {
        return $this->belongsToMany(Permiso::class, 'rol_permiso', 'rol_id', 'permiso_id');
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

    public function scopeSearch($query, $search) {
        if ($search) {
            return $query->where('rol_nombre', 'LIKE', "%{$search}%");
        }
    }
}
