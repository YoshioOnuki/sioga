<?php

namespace App\Livewire\ObtencionGrado;

use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Obtención de Grado')]
#[Layout('components.layouts.app')]
class Index extends Component
{
    public $persona_id;
    public $proceso_numero = 0;

    public function mount()
    {
        $this->persona_id = auth()->user()->persona->persona_id;
    }

    #[On('registro-proyecto-tesis')]
    public function refrescar() {
        $this->render();
    }

    public function render()
    {
        $persona = Persona::find($this->persona_id);
        if ($persona->tesista->proyecto_tesista()->count() > 0) {
            $this->proceso_numero = $persona->tesista->proyecto_tesista()->orderBy('proyecto_tesista_id', 'desc')->first()->proyecto->proceso->proceso_numero ?? 0;
        }
        
        return view('livewire.obtencion-grado.index');
    }
}
