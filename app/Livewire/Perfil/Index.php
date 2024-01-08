<?php

namespace App\Livewire\Perfil;

use App\Models\Usuario;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Perfil')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    public $usuario_id;
    public $usuario;
    public $tesista;
    public $docente;

    public function mount($usuario_id)
    {
        $this->usuario_id = $usuario_id;
        $this->usuario = Usuario::find($usuario_id);

        if (!$this->usuario) {
            abort(404, 'No se encontró el usuario.');
        }

        if ($this->usuario->usuario_id != auth()->user()->usuario_id) {
            if (auth()->user()->rol->rol_nombre != 'ADMINISTRADOR') {
                abort(403, 'No tiene permisos para acceder a esta página.');
            }
        }

        if ($this->usuario->persona->tesista) {
            $this->tesista = $this->usuario->persona->tesista;
        }
        if ($this->usuario->persona->docente) {
            $this->docente = $this->usuario->persona->docente;
        }
    }

    public function mostrar_toast()
    {
        $this->dispatch(
            'toast-basico',
            mensaje: session('mensaje'),
            type: session('tipo')
        );
        session()->forget(['modo', 'mensaje', 'tipo']);
    }

    public function render()
    {
        return view('livewire.perfil.index');
    }
}
