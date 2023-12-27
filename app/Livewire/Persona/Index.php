<?php

namespace App\Livewire\Persona;

use App\Models\Genero;
use App\Models\GradoAcademico;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Ubigeo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Personas - Sioga')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = 10;

    #[Url('buscar')]
    public $search = '';

    public function mostrar_toast()
    {
        $this->dispatch(
            'toast-basico',
            mensaje: session('mensaje'),
            type: session('tipo')
        );
        session()->forget(['modo', 'mensaje', 'tipo']);
    }

    public function render()
    {
        $personas = Persona::search($this->search)
            ->where('persona_estado', 1)
            ->where('persona_id', '!=', auth()->user()->persona->persona_id)
            ->paginate(10);
        return view('livewire.persona.index', [
            'personas' => $personas,
        ]);
    }
}
