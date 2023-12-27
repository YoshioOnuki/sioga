<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home as Home;
use App\Livewire\Auth\Login as Login;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Persona\Index as PersonaIndex;
use App\Livewire\Configuracion\Rol\Index as RolIndex;
use App\Livewire\Configuracion\Rol\Create as RolCreate;
use App\Livewire\Configuracion\Permiso\Index as PermisoIndex;

// RUTA DE INICIO
Route::get('/', Home::class)
    ->name('inicio');
// RUTA DE LOGIN
Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');
// RUTA DE LOGOUT
Route::group(['middleware' => ['auth']], function () {
    // HOME ADMINISTRADOR
    Route::get('/home', HomeIndex::class)
        ->name('home');
    // CONFIGURACIÓN DE PERSONAS
    Route::get('/persona', PersonaIndex::class)
        ->name('persona');
    // CONFIGURACIÓN DE ROLES
    Route::get('/configuracion/roles', RolIndex::class)
        ->name('configuracion-rol');
    Route::get('/configuracion/rol/create', RolCreate::class)
        ->name('configuracion-rol-create');
    Route::get('/configuracion/rol/{rol_id}/edit', RolCreate::class)
        ->name('configuracion-rol-edit');
    // CONFIGURACIÓN DE PERMISOS
    Route::get('/configuracion/permisos', PermisoIndex::class)
        ->name('configuracion-permiso');
});
