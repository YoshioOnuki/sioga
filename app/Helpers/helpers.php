<?php

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
        return 'bg-yellow-lt';
    } else if ($rol->rol_nombre == 'COMISIÓN') {
        return 'bg-teal-lt';
    }
}
