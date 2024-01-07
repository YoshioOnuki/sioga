<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use Livewire\Component;

class EstadoProcesoPosgrado extends Component
{
    // PASO 2: PROYECTO DE TESIS APROBADO
    public $titulo_proyecto = "SISTEMA WEB PARA LA GESTIÓN DEL PROCESO DE OBTENCIÓN DE GRADOS ACADÉMICOS EN LA ESCUELA DE POSGRADO DE LA UNIVERSIDAD NACIONAL DE UCAYALI, 2023";
    public $fecha_aprobacion_proyecto;

    public function mount() {
        $this->fecha_aprobacion_proyecto = now()->format('Y-m-d');
    }

    public function render()
    {
        return view('livewire.obtencion-grado.proyecto-tesis.estado-proceso-posgrado');
    }
}
