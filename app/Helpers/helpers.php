<?php

use App\Models\Ubigeo;
use App\Models\Usuario;

function formatFechaHoras($fecha)
{
    // hora en formato 12 horas y fecha en formato dd/mm/yyyy
    return date('h:i A d/m/Y', strtotime($fecha));
}

function formatFecha($fecha)
{
    // fecha en formato dd/mm/yyyy
    return date('d/m/Y', strtotime($fecha));
}

function getColorRol($usuario_id)
{
    $usuario = Usuario::find($usuario_id);
    $rol = $usuario->rol;
    if ($rol->rol_nombre == 'ADMINISTRADOR') {
        return 'bg-indigo-lt';
    } else if ($rol->rol_nombre == 'DOCENTE') {
        return 'bg-green-lt';
    } else if ($rol->rol_nombre == 'TESISTA') {
        return 'bg-pink-lt';
    } else if ($rol->rol_nombre == 'COMISION') {
        return 'bg-teal-lt';
    }
}

function getUbigeo($ubigeo_id)
{
    $ubigeo = Ubigeo::find($ubigeo_id);
    $ubigeo = $ubigeo->ubigeo_departamento . ' / ' . $ubigeo->ubigeo_provincia . ' / ' . $ubigeo->ubigeo_distrito;
    return $ubigeo;
}

function isAdministrador($usuario_id)
{
    $usuario = Usuario::find($usuario_id);
    $rol = $usuario->rol;
    if ($rol->rol_nombre == 'ADMINISTRADOR') {
        return true;
    } else {
        return false;
    }
}