<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'usuario';
    protected $primaryKey = 'usuario_id';
    protected $fillable = [
        'usuario_id',
        'usuario_correo',
        'usuario_password',
        'usuario_avatar',
        'usuario_estado',
        'persona_id',
        'rol_id'
    ];

    public function persona(): BelongsTo
    {
        return $this->belongsTo(Persona::class, 'persona_id');
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function permiso($permiso): bool
    {
        $rol = $this->rol;
        $permisos = $rol->permisos;
        foreach ($permisos as $p) {
            if ($p->permiso_nombre == $permiso) {
                return true;
            }
        }
        return false;
    }

    public function getAvatarAttribute(): string
    {
        return $this->persona->avatar;
    }

    public function getEsAdministradorAttribute(): bool
    {
        return $this->rol->rol_nombre === "ADMINISTRADOR";
    }

    protected static function boot()
    {
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
