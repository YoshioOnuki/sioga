<?php

namespace App\Livewire\Auth;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

use function PHPSTORM_META\type;

#[Layout('components.layouts.auth')]
#[Title('Login - SIOGA - Sistema de Obtención de Grado Académico - Escuela de Posgrado - UNU')]
class Login extends Component
{
    #[Validate('required|email')]
    public $correo_electronico;
    #[Validate('required')]
    public $contraseña;
    public $remember_me = false;

    public function ingresar() {
        $this->validate();
        // buscar el usuario
        $usuario = Usuario::where('usuario_correo', $this->correo_electronico)->first();
        if ($usuario) {
            // verificar la contraseña
            if (Hash::check($this->contraseña, $usuario->usuario_password)) {
                // iniciar sesión
                auth()->login($usuario, $this->remember_me);
                // redireccionar
                redirect()->route('home');
            } else {
                $this->addError('correo_electronico', 'Las credenciales son incorrectas');
                // mostramos mensaje
                $this->dispatch(
                    'toast-basico',
                    mensaje: 'Las credenciales son incorrectas',
                    type: 'error'
                );
            }
        } else {
            $this->addError('correo_electronico', 'Las credenciales son incorrectas');
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'Las credenciales son incorrectas',
                type: 'error'
            );
        }
    }

    public function render() {
        return view('livewire.auth.login');
    }
}
