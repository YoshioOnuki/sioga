<?php

namespace App\Livewire\Persona;

use App\Models\Genero;
use App\Models\GradoAcademico;
use App\Models\Persona;
use App\Models\Rol;
use App\Models\TipoDocumento;
use App\Models\Ubigeo;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Title('Personas - Sioga')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = 10;

    #[Url('buscar')]
    public $search = '';

    public $titulo_modal = 'Crear asigación de usuario';
    public $boton_modal = 'Crear asignación';
    public $modo = 'create';
    public $persona_id;

    // variables para el modal asignar usuario
    public $usuario_id;
    #[Validate('required|email|max:50|unique:usuario,usuario_correo')]
    public $correo_electronico;
    #[Validate('required|string|min:8|max:50')]
    public $contraseña;
    #[Validate('required|string|min:8|max:50|same:contraseña')]
    public $confirmar_contraseña;
    #[Validate('nullable|boolean')]
    public $estado;
    #[Validate('nullable|image|max:4096')]
    public $avatar;
    public $avatar_temp;
    #[Validate('required|exists:rol,rol_id')]
    public $rol;

    public function mostrar_toast()
    {
        $this->dispatch(
            'toast-basico',
            mensaje: session('mensaje'),
            type: session('tipo')
        );
        session()->forget(['modo', 'mensaje', 'tipo']);
    }

    public function limpiar_modal()
    {
        $this->reset([
            'correo_electronico',
            'contraseña',
            'confirmar_contraseña',
            'estado',
            'avatar',
            'avatar_temp',
            'rol'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function asignar_usuario($persona_id)
    {
        $this->limpiar_modal();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->persona_id = $persona_id;
        $usuario = Usuario::where('persona_id', $persona_id)->first();
        if ($usuario) {
            $this->modo = 'edit';
            $this->titulo_modal = 'Editar asigación de usuario';
            $this->boton_modal = 'Guardar cambios';
            $this->usuario_id = $usuario->usuario_id;
            $this->correo_electronico = $usuario->usuario_correo;
            $this->estado = $usuario->usuario_estado == 1 ? true : false;
            $this->rol = $usuario->rol_id;
            $this->avatar_temp = $usuario->usuario_avatar;
        } else {
            $this->modo = 'create';
            $this->titulo_modal = 'Crear asigación de usuario';
            $this->boton_modal = 'Crear asignación';
        }
    }

    public function guardar()
    {
        // validamos los campos
        $this->validate([
            'correo_electronico' => 'required|email|max:50|unique:usuario,usuario_correo,' . $this->usuario_id . ',usuario_id',
            'contraseña' => $this->modo == 'create' ? 'required|string|min:8|max:50' : 'nullable|string|min:8|max:50',
            'confirmar_contraseña' => $this->modo == 'create'
                ? 'required|string|min:8|max:50|same:contraseña'
                : ($this->contraseña
                    ? 'required|string|min:8|max:50|same:contraseña'
                    : 'nullable|string|min:8|max:50|same:contraseña'),
            'estado' => 'nullable|boolean',
            'rol' => 'required|exists:rol,rol_id'
        ]);

        if ($this->modo == 'create') {
            $usuario = new Usuario();
            $usuario->usuario_correo = $this->correo_electronico;
            $usuario->usuario_password = Hash::make($this->contraseña);
            if ($this->avatar) {
                $path = 'files/images/';
                $filename = time() . $this->persona_id . uniqid() . '.' . $this->avatar->getClientOriginalExtension();
                $this->avatar->storeAs($path, $filename, 'public_file');
                $usuario->usuario_avatar = $path . $filename;
            }
            $usuario->usuario_estado = $this->estado;
            $usuario->persona_id = $this->persona_id;
            $usuario->rol_id = $this->rol;
            $usuario->save();
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El usuario se asignó correctamente',
                type: 'success'
            );
        } else {
            $usuario = Usuario::where('persona_id', $this->persona_id)->first();
            $usuario->usuario_correo = $this->correo_electronico;
            if ($this->contraseña) {
                $usuario->usuario_password = Hash::make($this->contraseña);
            }
            if ($this->avatar) {
                // verificamos si existe una imagen anterior
                if ($usuario->usuario_avatar) {
                    // eliminamos la imagen anterior
                    unlink(public_path($usuario->usuario_avatar));
                }
                $path = 'files/images/';
                $filename = time() . $this->persona_id . uniqid() . '.' . $this->avatar->getClientOriginalExtension();
                $this->avatar->storeAs($path, $filename, 'public_file');
                $usuario->usuario_avatar = $path . $filename;
            }
            $usuario->usuario_estado = $this->estado;
            $usuario->rol_id = $this->rol;
            $usuario->save();
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'El usuario se actualizó correctamente',
                type: 'success'
            );
        }
        // cerramos el modal
        $this->dispatch(
            'modal',
            modal: '#modal-asignar-usuario',
            action: 'hide'
        );
        // limpiamos el modal
        $this->limpiar_modal();
    }

    public function render()
    {
        $personas = Persona::search($this->search)
            ->where('persona_estado', 1)
            ->where('persona_id', '!=', auth()->user()->persona->persona_id)
            ->paginate(10);
        $roles = Rol::where('rol_estado', 1)->get();
        return view('livewire.persona.index', [
            'personas' => $personas,
            'roles' => $roles
        ]);
    }
}
