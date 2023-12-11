<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubigeo extends Model
{
    use HasFactory;

    protected $table = 'ubigeo';
    protected $primaryKey = 'ubigeo_id';
    protected $fillable = [
        'ubigeo_id',
        'ubigeo_codigo',
        'ubigeo_departamento_codigo',
        'ubigeo_provincia_codigo',
        'ubigeo_distrito_codigo',
        'ubigeo_departamento',
        'ubigeo_provincia',
        'ubigeo_distrito',
        'ubigeo_estado',
    ];
}
