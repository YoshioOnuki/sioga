<?php

namespace App\Livewire\Proyecto;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Proyectos')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.proyecto.index');
    }
}
