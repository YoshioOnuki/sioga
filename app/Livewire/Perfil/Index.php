<?php

namespace App\Livewire\Perfil;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Perfil')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.perfil.index');
    }
}
