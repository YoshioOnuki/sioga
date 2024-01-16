<?php

namespace App\Livewire\Proyecto;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Proyectos')]
#[Layout('components.layouts.app')]
class Index extends Component
{
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
        return view('livewire.proyecto.index');
    }
}
