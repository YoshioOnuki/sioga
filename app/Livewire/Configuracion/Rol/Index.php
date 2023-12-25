<?php

namespace App\Livewire\Configuracion\Rol;

use App\Models\Permiso;
use App\Models\Rol;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Configuración de roles')]
#[Layout('components.layouts.app')]
class Index extends Component {
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = '10';

    #[Url('buscar')]
    public $search = '';

    // variables modal
    public $title_modal = 'Crear nuevo rol';
    public $button_modal = 'Crear rol';
    public $modo = 'create';
    public $rol_id;

    // variables para el formulario
    #[Validate('required|string|max:50|unique:rol,rol_nombre')]
    public $nombre;
    #[Validate('nullable|boolean')]
    public $estado = false;
    #[Validate('nullable|array')]
    public $permiso = [];
    public $seleccionar_todo = false;

    public function create() {
        $this->limpiar_modal();
        $this->modo = 'create';
        $this->title_modal = 'Crear nuevo rol';
        $this->button_modal = 'Crear rol';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function limpiar_modal() {
        $this->reset([
            'nombre',
            'estado',
            'permiso',
            'seleccionar_todo'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updatedSeleccionarTodo() {
        if ($this->seleccionar_todo) {
            $this->permiso = Permiso::pluck('permiso_id')->toArray();
        } else {
            $this->permiso = [];
        }
    }

    public function edit($rol_id) {
        $this->limpiar_modal();
        $this->modo = 'edit';
        $this->title_modal = 'Editar rol';
        $this->button_modal = 'Guardar cambios';
        $this->resetErrorBag();
        $this->resetValidation();
        $rol = Rol::find($rol_id);
        $this->rol_id = $rol->rol_id;
        $this->nombre = $rol->rol_nombre;
        $this->estado = $rol->rol_estado == 1 ? true : false;
        $this->permiso = $rol->permisos->pluck('permiso_id')->toArray();
    }

    public function guardar() {
        // validamos los campos
        $this->validate([
            'nombre' => 'required|string|max:50|unique:rol,rol_nombre,' . $this->rol_id . ',rol_id',
            'estado' => 'nullable|boolean',
            'permiso' => 'nullable|array'
        ]);

        if ($this->modo == 'create') {
            $rol = new Rol();
            $rol->rol_nombre = $this->nombre;
            $rol->rol_estado = $this->estado;
            $rol->save();
            $rol->permisos()->sync($this->permiso);
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El rol se creo correctamente',
                type: 'success'
            );
        } else {
            $rol = Rol::find($this->rol_id);
            $rol->rol_nombre = $this->nombre;
            $rol->rol_estado = $this->estado;
            $rol->save();
            $rol->permisos()->sync($this->permiso);
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El rol se actualizo correctamente',
                type: 'success'
            );
        }
        // cerramos el modal
        $this->dispatch(
            'modal',
            modal: '#modal-rol',
            action: 'hide'
        );
        // limpiamos el modal
        $this->limpiar_modal();
    }

    public function delete($rol_id) {
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

    public function render() {
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
