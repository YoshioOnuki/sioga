<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use App\Models\Persona;
use App\Models\Proyecto;
use App\Models\ProyectoFile;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormularioRegistro extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $asesor;
    #[Validate('required')]
    public $titulo_proyecto;
    #[Validate('required|file|mimes:pdf|max:2048')]
    public $proyecto_file;
    #[Validate('required')]
    public $lineas_investigacion;

    public $persona_id;

    public function mount()
    {
        $this->asesor = '';
        $this->titulo_proyecto = '';
        $this->proyecto_file = '';
        $this->lineas_investigacion = '';
        $this->persona_id = auth()->user()->persona->persona_id;
    }

    public function confirmar() {
        $this->validate();

        $this->dispatch(
            'modal',
            modal: '#modal_confimacion',
            action: 'show'
        );
    }

    public function registrar() {
        //Cerrar modal
        $this->dispatch(
            'modal',
            modal: '#modal_confimacion',
            action: 'hide'
        );

        $persona = Persona::find($this->persona_id);
        if ($persona->tesista->programa->tipo_grado_academico === 'POSGRADO') {
            $proceso = 17;
            $tipo_proyecto_file = 3;
        } else {
            $proceso = 1;
            $tipo_proyecto_file = 1;
        }

        //Registrar proyecto de tesis
        $proyecto = new Proyecto();
        $proyecto->proceso_id = $proceso;
        $proyecto->asesor_id = $this->asesor;
        $proyecto->lineas_investigacion_id = $this->lineas_investigacion;
        $proyecto->proyecto_titulo = $this->titulo_proyecto;
        $proyecto->save();
        // dd($proyecto);

        //Registrar proyecto_tesista
        $proyecto->proyecto_tesista()->create([
            'proyecto_tesista_estado' => 1,
            'tesista_id' => $persona->tesista->tesista_id,
        ]);

        if ($this->proyecto_file) {
            $path = 'files/proyectos/';
            $filename = time() . $this->persona_id . uniqid() . '.' . $this->proyecto_file->getClientOriginalExtension();
            $this->proyecto_file->storeAs($path, $filename, 'public_file');
            // dd($this->proyecto_file);
            
            // Registrar proyecto_file
            $proyecto->proyecto_file()->create([
                'proyecto_file_path' => $path . $filename,
                'proyecto_file_estado' => 1,
                'proceso_id' => $proyecto->proceso_id,
                'tipo_proyecto_id' => $tipo_proyecto_file,
            ]);
        }

        //Mensaje de confirmación de registro
        $this->dispatch(
            'toast-basico',
            mensaje: 'El proyecto de tesis se registró correctamente',
            type: 'success'
        );

        $this->dispatch(
            'registro-proyecto-tesis',
        );
    }

    public function render()
    {
        return view('livewire.obtencion-grado.proyecto-tesis.formulario-registro');
    }
}
