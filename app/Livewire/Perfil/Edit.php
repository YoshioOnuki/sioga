<?php

namespace App\Livewire\Perfil;

use App\Models\Ubigeo;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Editar Perfil')]
#[Layout('components.layouts.app')]
class Edit extends Component
{
    use WithFileUploads;

    public $usuario_id;
    public $usuario;

    // variables
    #[Validate('required')]
    public $apellido_paterno;
    #[Validate('required')]
    public $apellido_materno;
    #[Validate('required')]
    public $nombre;
    #[Validate('required|exists:ubigeo,ubigeo_id')]
    public $ubigeo;
    #[Validate('nullable|string|min:8|max:50')]
    public $contraseña;
    #[Validate('nullable|string|min:8|max:50|same:contraseña')]
    public $confirmar_contraseña;
    #[Validate('nullable|image|max:4096')]
    public $avatar;
    public $avatar_temp;

    public function mount()
    {
        $usuario = Usuario::find($this->usuario_id);
        if (!$usuario) {
            abort(404, 'Usuario no encontrado.');
        }
        $this->usuario_id = $usuario->usuario_id;
        $this->usuario = $usuario;

        if ($usuario->usuario_id != auth()->user()->usuario_id) {
            if (auth()->user()->rol->rol_nombre != 'ADMINISTRADOR') {
                abort(403, 'No tiene permisos para acceder a esta página.');
            }
        }

        // cargar datos de usuario
        $this->apellido_paterno = $usuario->persona->persona_apellido_paterno;
        $this->apellido_materno = $usuario->persona->persona_apellido_materno;
        $this->nombre = $usuario->persona->persona_nombres;
        $this->ubigeo = $usuario->persona->ubigeo_id;
    }

    public function guardar()
    {
        // validamos los datos
        $this->validate();
        // actualizamos los datos
        $usuario = Usuario::find($this->usuario_id);
        if ($this->contraseña) {
            $usuario->usuario_password = Hash::make($this->contraseña);
        }
        if ($this->avatar) {
            $nombre_db = subirAvatar($this->avatar, $this->persona_id);
            $usuario->usuario_avatar = $nombre_db;
        }
        $usuario->save();
        // actualizamos los datos de la persona
        $persona = $usuario->persona;
        $persona->persona_apellido_paterno = $this->apellido_paterno;
        $persona->persona_apellido_materno = $this->apellido_materno;
        $persona->persona_nombres = $this->nombre;
        $persona->ubigeo_id = $this->ubigeo;
        $persona->save();
        // guardamos en sesion el tipo de mensaje y el mensaje
        session([
            'modo' => 'create',
            'tipo' => 'success',
            'mensaje' => 'Perfil actualizado correctamente.'
        ]);
        // redireccionamos
        return redirect()->route('perfil');
    }

    public function render()
    {
        $ubigeo_model = Ubigeo::where('ubigeo_estado', 1)->get();
        return view('livewire.perfil.edit', [
            'ubigeo_model' => $ubigeo_model,
        ]);
    }
}
