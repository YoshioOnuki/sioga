<?php

use App\Models\Rol;
use App\Models\Usuario;

function formatFechaHoras($fecha) {
    // hora en formato 12 horas y fecha en formato dd/mm/yyyy
    return date('h:i A d/m/Y', strtotime($fecha));
}

function formatFecha($fecha) {
    // fecha en formato dd/mm/yyyy
    return date('d/m/Y', strtotime($fecha));
}

function getRolByPersonaId($persona_id) {
    $usuario = Usuario::where('persona_id', $persona_id)->first();
    $rol = $usuario->rol ?? null;
    if ($rol) {
        if ($rol->rol_nombre == 'ADMINISTRADOR') {
            return [
                'rol_nombre' => $rol->rol_nombre,
                'rol_color' => 'bg-indigo-lt',
            ];
        } else if ($rol->rol_nombre == 'DOCENTE') {
            return [
                'rol_nombre' => $rol->rol_nombre,
                'rol_color' => 'bg-green-lt',
            ];
        } else if ($rol->rol_nombre == 'TESISTA') {
            return [
                'rol_nombre' => $rol->rol_nombre,
                'rol_color' => 'bg-yellow-lt',
            ];
        } else if ($rol->rol_nombre == 'COMISIÓN') {
            return [
                'rol_nombre' => $rol->rol_nombre,
                'rol_color' => 'bg-teal-lt',
            ];
        }
    } else {
        return [
            'rol_nombre' => 'SIN ROL',
            'rol_color' => 'bg-red-lt',
        ];
    }
}

function getRol($usuario_id) {
    $usuario = Usuario::find($usuario_id);
    $rol = $usuario->rol;
    if ($rol->rol_nombre == 'ADMINISTRADOR') {
        return [
            'rol_nombre' => $rol->rol_nombre,
            'rol_color' => 'bg-indigo-lt',
        ];
    } else if ($rol->rol_nombre == 'DOCENTE') {
        return [
            'rol_nombre' => $rol->rol_nombre,
            'rol_color' => 'bg-green-lt',
        ];
    } else if ($rol->rol_nombre == 'TESISTA') {
        return [
            'rol_nombre' => $rol->rol_nombre,
            'rol_color' => 'bg-yellow-lt',
        ];
    } else if ($rol->rol_nombre == 'COMISIÓN') {
        return [
            'rol_nombre' => $rol->rol_nombre,
            'rol_color' => 'bg-teal-lt',
        ];
    }
}
