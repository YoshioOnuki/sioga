<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home as Home;
use App\Livewire\Auth\Login as Login;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Inicio\Index as InicioIndex;
use App\Livewire\Perfil\Index as PerfilIndex;
use App\Livewire\Perfil\Edit as PerfilEdit;
use App\Livewire\Persona\Index as PersonaIndex;
use App\Livewire\Persona\Create as PersonaCreate;
use App\Livewire\Configuracion\Rol\Index as RolIndex;
use App\Livewire\Configuracion\Rol\Create as RolCreate;
use App\Livewire\Configuracion\Permiso\Index as PermisoIndex;
use App\Livewire\Proyecto\Index as ProyectoIndex;
use App\Livewire\Proyecto\Revisar as ProyectoRevisar;
use App\Livewire\Proyecto\Aprobar as ProyectoAprobar;
use App\livewire\ObtencionGrado\Index as OptencionGradoIndex;

// RUTA DE INICIO
Route::get('/', Home::class)
    ->name('inicio');
// RUTA DE LOGIN
Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');
// RUTA DE LOGOUT
Route::group(['middleware' => ['auth']], function () {
    // HOME
    Route::get('/home', HomeIndex::class)
        ->name('home');
    // HOME TESISTA
    Route::get('/inicio', InicioIndex::class)
        ->middleware('permiso:tesista-inicio-index')
        ->name('inicio');
    // PERFIL
    Route::get('/perfil/{usuario_id}', PerfilIndex::class)
        ->name('perfil');
    Route::get('/perfil/{usuario_id}/edit', PerfilEdit::class)
        ->name('perfil-edit');
    // CONFIGURACIÓN DE PERSONAS
    Route::get('/persona', PersonaIndex::class)
        ->middleware('permiso:persona-index')
        ->name('persona');
    Route::get('/persona/create', PersonaCreate::class)
        ->middleware('permiso:persona-create')
        ->name('persona-create');
    Route::get('/persona/{persona_id}/edit', PersonaCreate::class)
        ->middleware('permiso:persona-edit')
        ->name('persona-edit');
    // CONFIGURACIÓN DE ROLES
    Route::get('/configuracion/roles', RolIndex::class)
        ->middleware('permiso:rol-index')
        ->name('configuracion-rol');
    Route::get('/configuracion/rol/create', RolCreate::class)
        ->middleware('permiso:rol-create')
        ->name('configuracion-rol-create');
    Route::get('/configuracion/rol/{rol_id}/edit', RolCreate::class)
        ->middleware('permiso:rol-edit')
        ->name('configuracion-rol-edit');
    // CONFIGURACIÓN DE PERMISOS
    Route::get('/configuracion/permisos', PermisoIndex::class)
        ->middleware('permiso:permiso-index')
        ->name('configuracion-permiso');
    // PROYECTOS
    Route::get('/proyecto', ProyectoIndex::class)
        ->middleware('permiso:proyecto-index')
        ->name('proyecto');
    Route::get('/proyecto/{proyecto}/aprobar', ProyectoAprobar::class)
        ->middleware('permiso:proyecto-index')
        ->name('proyecto-aprobar');
    // OBTENCIÓN DE GRADO
    Route::get('/obtencion-grado', OptencionGradoIndex::class)
        ->middleware('permiso:obtencion-grado-index')
        ->name('obtencion-grado');
});
