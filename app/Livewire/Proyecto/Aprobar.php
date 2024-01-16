<?php

namespace App\Livewire\Proyecto;

use Livewire\Component;

class Aprobar extends Component
{
    public function aprobar_proyecto()
    {
        // guardamos en sesion el tipo de mensaje y el mensaje
        session([
            'modo' => 'create',
            'tipo' => 'success',
            'mensaje' => 'El proyecto de tesis se aprobó correctamente'
        ]);

        return redirect()->route('proyecto');
    }

    public function enviar()
    {
        // guardamos en sesion el tipo de mensaje y el mensaje
        session([
            'modo' => 'create',
            'tipo' => 'success',
            'mensaje' => 'El proyecto no se aceptó y se envió el mensaje al tesista'
        ]);

        return redirect()->route('proyecto');
    }

    public function salir()
    {
        return redirect()->route('proyecto');
    }

    public function render()
    {
        return view('livewire.proyecto.aprobar');
    }
}
