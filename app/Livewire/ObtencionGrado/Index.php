<?php

namespace App\Livewire\ObtencionGrado;

use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Obtención de Grado')]
#[Layout('components.layouts.app')]
class Index extends Component
{

    #[On('registro-proyecto-tesis')]
    public function refrescar() {
        $this->render();
    }

    public function render()
    {
        return view('livewire.obtencion-grado.index');
    }
}
