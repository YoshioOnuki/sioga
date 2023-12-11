<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home as Home;

// RUTA DE INICIO
Route::get('/', Home::class)
    ->name('inicio');
