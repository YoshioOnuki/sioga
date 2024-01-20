<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use App\Models\Persona;
use Livewire\Component;

class NumeroProceso extends Component
{
    public $persona_id;
    public $proceso_numero;

    public function mount() {
        $this->persona_id = auth()->user()->persona->persona_id;
    }

    public function render()
    {
        $persona = Persona::find($this->persona_id);
        if ($persona->tesista->proyecto_tesista()->count() > 0) {
            $this->proceso_numero = $persona->tesista->proyecto_tesista()->orderBy('proyecto_tesista_id', 'desc')->first()->proyecto->proceso->proceso_numero ?? 0;
        }
        
        return view('livewire.obtencion-grado.proyecto-tesis.numero-proceso');
    }
}
