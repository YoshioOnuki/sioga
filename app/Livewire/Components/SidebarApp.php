<?php

namespace App\Livewire\Components;

use Illuminate\Http\Request;
use Livewire\Component;

class SidebarApp extends Component
{
    public $usuario;
    public $persona;

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function cambiar_tema() {
        $this->dispatch('cambiar_tema');
    }

    public function render() {
        $this->usuario = auth()->user();
        $this->persona = $this->usuario->persona;
        $nombre = $this->persona->solo_primeros_nombres;
        // dd(session()->all());
        return view('livewire.components.sidebar-app', [
            'nombre' => $nombre
        ]);
    }
}
