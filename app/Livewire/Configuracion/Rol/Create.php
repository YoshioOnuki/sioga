<?php

namespace App\Livewire\Configuracion\Rol;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Crear rol')]
#[Layout('components.layouts.app')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.configuracion.rol.create');
    }
}
