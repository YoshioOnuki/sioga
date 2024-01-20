<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use App\Models\Persona;
use Livewire\Component;

class EstadoProcesoPosgrado extends Component
{

    public $persona_id;
    public $proceso_numero;

    // PASO 2: PROYECTO DE TESIS APROBADO
    public $titulo_proyecto = "SISTEMA WEB PARA LA GESTIÓN DEL PROCESO DE OBTENCIÓN DE GRADOS ACADÉMICOS EN LA ESCUELA DE POSGRADO DE LA UNIVERSIDAD NACIONAL DE UCAYALI, 2023";
    public $fecha_aprobacion_proyecto;

    public function mount() {
        $this->fecha_aprobacion_proyecto = now()->format('Y-m-d');
        $this->persona_id = auth()->user()->persona->persona_id;
    }

    public function render()
    {
        $persona = Persona::find($this->persona_id);
        if ($persona->tesista->proyecto_tesista()->count() > 0) {
            $this->proceso_numero = $persona->tesista->proyecto_tesista()->orderBy('proyecto_tesista_id', 'desc')->first()->proyecto->proceso->proceso_numero ?? 0;
        }
        
        return view('livewire.obtencion-grado.proyecto-tesis.estado-proceso-posgrado');
    }
}
