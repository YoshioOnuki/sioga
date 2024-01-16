<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
#[Title('Registro - SIOGA - Sistema de Obtención de Grado Académico - Escuela de Posgrado - UNU')]
class Register extends Component
{
    #[Validate('required')]
    public $codigo;
    #[Validate('required')]
    public $numero_documento;

    public function registrar(){
        $this->validate();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
