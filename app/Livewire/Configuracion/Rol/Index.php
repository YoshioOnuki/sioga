<?php

namespace App\Livewire\Configuracion\Rol;

use App\Models\Permiso;
use App\Models\Rol;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Configuración de roles')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = '10';

    #[Url('buscar')]
    public $search = '';

    public function mostrar_toast()
    {
        $this->dispatch(
            'toast-basico',
            mensaje: session('mensaje'),
            type: session('tipo')
        );
        session()->forget(['modo', 'mensaje', 'tipo']);
    }

    public function delete($rol_id)
    {
        // verificamos si el rol tiene usuarios asignados
        $rol = Rol::find($rol_id);
        if ($rol->usuarios->count() > 0) {
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El rol tiene usuarios asignados, no se puede eliminar',
                type: 'error'
            );
            return;
        }
        // eliminamos el rol
        $rol = Rol::find($rol_id);
        $rol->delete();
        // mostramos mensaje
        $this->dispatch(
            'toast-basico',
            mensaje: 'El rol se elimino correctamente',
            type: 'success'
        );
    }

    public function render()
    {
        $roles = Rol::search($this->search)
            ->orderBy('created_at', 'desc')
            ->paginate($this->mostrar_paginate);
        $permisos = Permiso::orderBy('permiso_nombre', 'asc')->get();
        return view('livewire.configuracion.rol.index', [
            'roles' => $roles,
            'permisos' => $permisos
        ]);
    }
}
