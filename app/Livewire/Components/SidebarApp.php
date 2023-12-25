<?php

namespace App\Livewire\Components;

use Livewire\Component;

class SidebarApp extends Component
{
    public $usuario;
    public $persona;

    public function logout() {
        auth()->logout();
        return redirect()->route('login');
    }

    public function render() {
        $this->usuario = auth()->user();
        $this->persona = $this->usuario->persona;
        $nombre = $this->persona->solo_primeros_nombres;
        return view('livewire.components.sidebar-app', [
            'nombre' => $nombre
        ]);
    }
}
