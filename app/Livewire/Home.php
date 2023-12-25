<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.home')]
#[Title('SIOGA - Sistema de Obtención de Grado Académico - Escuela de Posgrado - UNU')]
class Home extends Component
{
    public function render()
    {
        return view('livewire.home');
    }
}
