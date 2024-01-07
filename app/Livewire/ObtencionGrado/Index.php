<?php

namespace App\Livewire\ObtencionGrado;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Obtención de Grado')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    // PASO 2: PROYECTO DE TESIS APROBADO
    public $titulo_proyecto = "SISTEMA WEB PARA LA GESTIÓN DEL PROCESO DE OBTENCIÓN DE GRADOS ACADÉMICOS EN LA ESCUELA DE POSGRADO DE LA UNIVERSIDAD NACIONAL DE UCAYALI, 2023";
    public $fecha_aprobacion_proyecto = "2021-09-01";

    public function render()
    {
        return view('livewire.obtencion-grado.index');
    }
}
