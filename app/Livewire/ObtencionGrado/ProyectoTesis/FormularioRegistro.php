<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use Livewire\Component;

class FormularioRegistro extends Component
{

    public function registrar() {
        $this->dispatch(
            'toast-basico',
            mensaje: 'El proyecto de tesis se registró correctamente',
            type: 'success'
        );

        session(['paso' => '1']);

        $this->dispatch(
            'registro-proyecto-tesis',
        );
    }

    public function render()
    {
        return view('livewire.obtencion-grado.proyecto-tesis.formulario-registro');
    }
}
