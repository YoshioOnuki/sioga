<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioRegistro extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $asesor;
    #[Validate('required')]
    public $titulo_proyecto;
    #[Validate('required|file|mimes:pdf|max:2048')]
    public $proyecto;

    public function confirmar() {
        $this->validate();

        $this->dispatch(
            'modal',
            modal: '#modal_confimacion',
            action: 'show'
        );
    }

    public function registrar() {
        //Cerrar modal
        $this->dispatch(
            'modal',
            modal: '#modal_confimacion',
            action: 'hide'
        );

        //Mensaje de confirmación de registro
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
