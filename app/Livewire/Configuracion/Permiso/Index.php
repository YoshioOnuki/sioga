<?php

namespace App\Livewire\Configuracion\Permiso;

use App\Models\Permiso;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Configuración de permisos')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = '10';

    #[Url('buscar')]
    public $search = '';

    // variables modal
    public $title_modal = 'Crear nuevo permiso';
    public $button_modal = 'Crear permiso';
    public $modo = 'create';
    public $permiso_id;

    // variables para el formulario
    #[Validate('required|string|max:50|unique:permiso,permiso_nombre')]
    public $nombre;
    #[Validate('nullable|boolean')]
    public $estado = false;

    public function create()
    {
        $this->limpiar_modal();
        $this->modo = 'create';
        $this->title_modal = 'Crear nuevo permiso';
        $this->button_modal = 'Crear permiso';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function limpiar_modal()
    {
        $this->reset([
            'nombre',
            'estado'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($permiso_id)
    {
        $this->limpiar_modal();
        $this->modo = 'edit';
        $this->title_modal = 'Editar permiso';
        $this->button_modal = 'Guardar cambios';
        $this->resetErrorBag();
        $this->resetValidation();
        $permiso = Permiso::find($permiso_id);
        $this->permiso_id = $permiso->permiso_id;
        $this->nombre = $permiso->permiso_nombre;
        $this->estado = $permiso->permiso_estado == 1 ? true : false;
    }

    public function guardar()
    {
        // validamos los campos
        $this->validate([
            'nombre' => 'required|string|max:50|unique:permiso,permiso_nombre,' . $this->permiso_id . ',permiso_id',
            'estado' => 'nullable|boolean'
        ]);

        if ($this->modo == 'create') {
            $permiso = new Permiso();
            $permiso->permiso_nombre = $this->nombre;
            $permiso->permiso_estado = $this->estado;
            $permiso->save();
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El permiso se creo correctamente',
                type: 'success'
            );
        } else {
            $permiso = Permiso::find($this->permiso_id);
            $permiso->permiso_nombre = $this->nombre;
            $permiso->permiso_estado = $this->estado;
            $permiso->save();
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El permiso se actualizo correctamente',
                type: 'success'
            );
        }
        // cerramos el modal
        $this->dispatch(
            'modal',
            modal: '#modal-permiso',
            action: 'hide'
        );
        // limpiamos el modal
        $this->limpiar_modal();
    }

    public function delete($permiso_id)
    {
        // verificamos si el permiso tiene roles asignados
        $permiso = Permiso::find($permiso_id);
        if ($permiso->roles->count() > 0) {
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El permiso tiene roles asignados, no se puede eliminar',
                type: 'error'
            );
            return;
        }
        // eliminamos el permiso
        $permiso->delete();
        // mostramos mensaje
        $this->dispatch(
            'toast-basico',
            mensaje: 'El permiso se elimino correctamente',
            type: 'success'
        );
    }

    public function render()
    {
        $permisos = Permiso::search($this->search)
            ->orderBy('created_at', 'desc')
            ->paginate($this->mostrar_paginate);
        return view('livewire.configuracion.permiso.index', [
            'permisos' => $permisos
        ]);
    }
}
