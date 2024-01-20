<?php

namespace App\Livewire\ObtencionGrado\ProyectoTesis;

use App\Models\LineasInvestigacion;
use App\Models\Persona;
use App\Models\Proyecto;
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

        //Registrar proyecto_tesista
        $proyecto->proyecto_tesista()->create([
            'proyecto_tesista_estado' => 1,
            'tesista_id' => $persona->tesista->tesista_id,
        ]);

        if ($this->proyecto_file) {
            $path = 'files/proyectos/';
            $filename = time() . $this->persona_id . uniqid() . '.' . $this->proyecto_file->getClientOriginalExtension();
            $this->proyecto_file->storeAs($path, $filename, 'public_file');
            
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
        return view('livewire.obtencion-grado.proyecto-tesis.formulario-registro', [
            'asesores' => Persona::join('docente', 'docente.persona_id', 'persona.persona_id')
                ->join('docente_lineas_investigacion', 'docente_lineas_investigacion.docente_id', 'docente.docente_id')
                ->join('usuario', 'usuario.persona_id', 'persona.persona_id')
                ->join('rol', 'rol.rol_id', 'usuario.rol_id')
                ->where('persona_estado', 1)
                ->where('rol.rol_nombre', 'DOCENTE')
                ->where('docente_lineas_investigacion.docente_id', 'docente.docente_id')
                ->get(),
            'lineas_investigaciones' => LineasInvestigacion::where('lineas_investigacion_estado', 1)->get(),
        ]);
    }
}
