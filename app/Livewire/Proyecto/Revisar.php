<?php

namespace App\Livewire\Proyecto;

use Livewire\Component;

class Revisar extends Component
{
    public $array = [];

    public function añadir_observacion()
    {
        $con = count($this->array);
        $this->array[] = $con;
    }

    public function finalizar()
    {
        // guardamos en sesion el tipo de mensaje y el mensaje
        session([
            'modo' => 'create',
            'tipo' => 'success',
            'mensaje' => 'El proyecto de tesis se revisó correctamente'
        ]);

        return redirect()->route('proyecto');
    }

    public function render()
    {
        return view('livewire.proyecto.revisar');
    }
}
