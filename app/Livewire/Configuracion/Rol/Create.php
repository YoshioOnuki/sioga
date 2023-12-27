<?php

namespace App\Livewire\Configuracion\Rol;

use App\Models\Permiso;
use App\Models\Rol;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Livewire\Configuracion\Rol\Index as RolIndex;

#[Layout('components.layouts.app')]
class Create extends Component
{
    // variables 
    public $titulo = 'Crear rol';
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

    public function mount()
    {
        if ($this->rol_id) {
            $rol = Rol::find($this->rol_id);
            $this->rol_id = $rol->rol_id;
            $this->nombre = $rol->rol_nombre;
            $this->estado = $rol->rol_estado == 1 ? true : false;
            $this->permiso = $rol->permisos->pluck('permiso_id')->toArray();
            $this->titulo = 'Editar rol';
            $this->modo = 'edit';
        } else {
            $this->rol_id = null;
            $this->titulo = 'Crear rol';
            $this->modo = 'create';
        }
    }

    public function updatedSeleccionarTodo()
    {
        if ($this->seleccionar_todo) {
            $this->permiso = Permiso::pluck('permiso_id')->toArray();
        } else {
            $this->permiso = [];
        }
    }

    public function guardar()
    {
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
            // guardamos en sesion el tipo de mensaje y el mensaje
            session([
                'modo' => 'create',
                'tipo' => 'success',
                'mensaje' => 'Rol creado correctamente.'
            ]);
        } else {
            $rol = Rol::find($this->rol_id);
            $rol->rol_nombre = $this->nombre;
            $rol->rol_estado = $this->estado;
            $rol->save();
            $rol->permisos()->sync($this->permiso);
            // guardamos en sesion el tipo de mensaje y el mensaje
            session([
                'modo' => 'edit',
                'tipo' => 'success',
                'mensaje' => 'Rol editado correctamente.'
            ]);
        }
        // redireccionamos a la vista de roles
        return redirect()->route('configuracion-rol');
    }

    public function render()
    {
        $permisos = Permiso::orderBy('permiso_nombre', 'asc')->get();
        return view('livewire.configuracion.rol.create', [
            'permisos' => $permisos
        ])->title($this->titulo);
    }
}
