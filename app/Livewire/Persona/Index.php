<?php

namespace App\Livewire\Persona;

use App\Models\Genero;
use App\Models\GradoAcademico;
use App\Models\Persona;
use App\Models\TipoDocumento;
use App\Models\Ubigeo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Personas - Sioga')]
#[Layout('components.layouts.app')]
class Index extends Component {
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Url('mostrar')]
    public $mostrar_paginate = '10';

    #[Url('buscar')]
    public $search = '';

    // variables modal
    public $title_modal = 'Crear nuevo persona';
    public $button_modal = 'Crear persona';
    public $modo = 'create';
    public $persona_id;

    // variables
    #[Validate('required|exists:tipo_documento,tipo_documento_id')]
    public $tipo_documento;
    #[Validate('required|numeric')]
    public $documento;
    #[Validate('required')]
    public $apellido_paterno;
    #[Validate('required')]
    public $apellido_materno;
    #[Validate('required')]
    public $nombre;
    #[Validate('required|exists:genero,genero_id')]
    public $genero;
    #[Validate('required|exists:grado_academico,grado_academico_id')]
    public $grado_academico;
    #[Validate('required|exists:ubigeo,ubigeo_id')]
    public $ubigeo;
    #[Validate('required')]
    public $tipo_perfil = 0;
    #[Validate('nullable|boolean')]
    public $estado;
    #[Validate('nullable|file|max:2048|mimes:pdf')]
    public $grado_academico_file;
    #[Validate('nullable|exists:programa,programa_id')]
    public $programa;
    #[Validate('nullable|file|max:2048|mimes:pdf')]
    public $cv_file;

    public function create() {
        $this->limpiar_modal();
        $this->modo = 'create';
        $this->title_modal = 'Crear nuevo persona';
        $this->button_modal = 'Crear persona';
    }

    public function limpiar_modal() {
        $this->reset([
            'tipo_documento',
            'documento',
            'apellido_paterno',
            'apellido_materno',
            'nombre',
            'genero',
            'grado_academico',
            'ubigeo',
            'tipo_perfil',
            'estado',
            'grado_academico_file',
            'programa',
            'cv_file',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function edit($persona_id) {
        $this->limpiar_modal();
        $this->modo = 'edit';
        $this->title_modal = 'Editar persona';
        $this->button_modal = 'Guardar cambios';
        $this->resetErrorBag();
        $this->resetValidation();
        $persona = Persona::find($persona_id);
        $this->persona_id = $persona->persona_id;
        $this->tipo_documento = $persona->tipo_documento_id;
        $this->documento = $persona->persona_documento;
        $this->apellido_paterno = $persona->persona_apellido_paterno;
        $this->apellido_materno = $persona->persona_apellido_materno;
        $this->nombre = $persona->persona_nombres;
        $this->genero = $persona->genero_id;
        $this->grado_academico = $persona->grado_academico_id;
        $this->ubigeo = $persona->ubigeo_id;
        $this->estado = $persona->persona_estado == 1 ? true : false;
        if ($persona->tesista->first()) {
            $this->tipo_perfil = 1;
        } elseif ($persona->docente->first()) {
            $this->tipo_perfil = 2;
        } else {
            $this->tipo_perfil = 0;
        }
    }

    public function guardar() {
        // validamos los campos
        if ($this->tipo_perfil == 1) {
            $this->validate([
                'tipo_documento' => 'required|exists:tipo_documento,tipo_documento_id',
                'documento' => 'required|numeric',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'nombre' => 'required',
                'genero' => 'required|exists:genero,genero_id',
                'grado_academico' => 'required|exists:grado_academico,grado_academico_id',
                'ubigeo' => 'required|exists:ubigeo,ubigeo_id',
                'estado' => 'nullable|boolean',
                'grado_academico_file' => 'required|file|max:2048|mimes:pdf',
                'programa' => 'required|exists:programa,programa_id',
            ]);
        } elseif ($this->tipo_perfil == 2) {
            $this->validate([
                'tipo_documento' => 'required|exists:tipo_documento,tipo_documento_id',
                'documento' => 'required|numeric',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'nombre' => 'required',
                'genero' => 'required|exists:genero,genero_id',
                'grado_academico' => 'required|exists:grado_academico,grado_academico_id',
                'ubigeo' => 'required|exists:ubigeo,ubigeo_id',
                'estado' => 'nullable|boolean',
                'cv_file' => 'required|file|max:2048|mimes:pdf',
            ]);
        } else {
            $this->validate([
                'tipo_documento' => 'required|exists:tipo_documento,tipo_documento_id',
                'documento' => 'required|numeric',
                'apellido_paterno' => 'required',
                'apellido_materno' => 'required',
                'nombre' => 'required',
                'genero' => 'required|exists:genero,genero_id',
                'grado_academico' => 'required|exists:grado_academico,grado_academico_id',
                'ubigeo' => 'required|exists:ubigeo,ubigeo_id',
                'estado' => 'nullable|boolean',
            ]);
        }
        // guardamos los datos
        if ($this->modo == 'create') {
            $persona = new Persona();
            $persona->persona_documento = $this->documento;
            $persona->persona_apellido_paterno = strtoupper($this->apellido_paterno);
            $persona->persona_apellido_materno = strtoupper($this->apellido_materno);
            $persona->persona_nombres = strtoupper($this->nombre);
            $persona->tipo_documento_id = $this->tipo_documento;
            $persona->genero_id = $this->genero;
            $persona->grado_academico_id = $this->grado_academico;
            $persona->ubigeo_id = $this->ubigeo;
            $persona->persona_estado = $this->estado ? 1 : 0;
            $persona->save();
            // si es tesista guardamos sus datos
            if ($this->tipo_perfil == 1) {
                // $persona->tesista()->create([
                //     'programa_id' => $this->programa,
                //     'tesista_grado_path' => $this->grado_academico_file->store('public/tesista/grado_academico'),
                // ]);
                // TODO: guardar tesista
            } elseif ($this->tipo_perfil == 2) {
                // $persona->docente()->create([
                //     'docente_cv_path' => $this->cv_file->store('public/docente/cv'),
                // ]);
                // TODO: guardar docente
            }
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'Persona agregada correctamente',
                type: 'success'
            );
        } else {
            $persona = Persona::find($this->persona_id);
            $persona->persona_documento = $this->documento;
            $persona->persona_apellido_paterno = strtoupper($this->apellido_paterno);
            $persona->persona_apellido_materno = strtoupper($this->apellido_materno);
            $persona->persona_nombres = strtoupper($this->nombre);
            $persona->tipo_documento_id = $this->tipo_documento;
            $persona->genero_id = $this->genero;
            $persona->grado_academico_id = $this->grado_academico;
            $persona->ubigeo_id = $this->ubigeo;
            $persona->persona_estado = $this->estado ? 1 : 0;
            $persona->save();
            // si es tesista guardamos sus datos
            if ($this->tipo_perfil == 1) {
                // $persona->tesista()->update([
                //     'programa_id' => $this->programa,
                //     'tesista_grado_path' => $this->grado_academico_file->store('public/tesista/grado_academico'),
                // ]);
            } elseif ($this->tipo_perfil == 2) {
                // $persona->docente()->update([
                //     'docente_cv_path' => $this->cv_file->store('public/docente/cv'),
                // ]);
            }
            // mostramos mensaje
            $this->dispatch(
                'toast-basico',
                mensaje: 'Persona actualizada correctamente',
                type: 'success'
            );
        }
        // cerrar modal
        $this->dispatch('modal',
            modal: '#modal-persona',
            action: 'hide'
        );
        // limpiar modal
        $this->limpiar_modal();
    }

    public function render() {
        $tipo_documento_model = TipoDocumento::where('tipo_documento_estado', 1)->get();
        $genero_model = Genero::where('genero_estado', 1)->get();
        $grado_academico_model = GradoAcademico::where('grado_academico_estado', 1)->get();
        $ubigeo_model = Ubigeo::where('ubigeo_estado', 1)->get();
        // ---
        $personas = Persona::search($this->search)
            ->where('persona_estado', 1)->paginate(10);
        return view('livewire.persona.index', [
            'tipo_documento_model' => $tipo_documento_model,
            'genero_model' => $genero_model,
            'grado_academico_model' => $grado_academico_model,
            'ubigeo_model' => $ubigeo_model,
            'personas' => $personas,
        ]);
    }
}
