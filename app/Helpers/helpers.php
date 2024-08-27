<?php

use App\Models\Ubigeo;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;

if (!function_exists('formatFechaHoras')) 
{
    function formatFechaHoras($fecha)
    {
        // hora en formato 12 horas y fecha en formato dd/mm/yyyy
        return date('h:i A d/m/Y', strtotime($fecha));
    }
}

if (!function_exists('formatFecha')) 
{
    function formatFecha($fecha)
    {
        // fecha en formato dd/mm/yyyy
        return date('d/m/Y', strtotime($fecha));
    }
}

if (!function_exists('getColorRol')) 
{
    function getColorRol($usuario_id)
    {
        $usuario = Usuario::find($usuario_id);
        $rol = $usuario->rol;
        if ($rol->rol_nombre == 'ADMINISTRADOR') {
            return 'bg-indigo-lt';
        } else if ($rol->rol_nombre == 'DOCENTE') {
            return 'bg-green-lt';
        } else if ($rol->rol_nombre == 'TESISTA') {
            return 'bg-azure-lt';
        } else if ($rol->rol_nombre == 'COMISION') {
            return 'bg-teal-lt';
        }
    }
}

if (!function_exists('getUbigeo')) 
{
    function getUbigeo($ubigeo_id)
    {
        $ubigeo = Ubigeo::find($ubigeo_id);
        $ubigeo = $ubigeo->ubigeo_departamento . ' / ' . $ubigeo->ubigeo_provincia . ' / ' . $ubigeo->ubigeo_distrito;
        return $ubigeo;
    }
}

if (!function_exists('subirAvatar')) 
{
    function subirAvatar($file, $persona_id)
    {
        // verificamos si existe una imagen anterior
        if ($file) {
            // eliminamos la imagen anterior
            $usuario = Usuario::where('persona_id', $persona_id)->first();
            if ($usuario->usuario_avatar) {
                Storage::disk('public_file')->delete($usuario->usuario_avatar);
            }
        }
        $path = 'files/images/';
        $filename = time() . $persona_id . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($path, $filename, 'public_file');
        $nombre_db = $path . $filename;

        return $nombre_db;
    }
}
