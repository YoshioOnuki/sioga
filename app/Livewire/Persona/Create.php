<?php

namespace App\Livewire\Persona;

use App\Models\Genero;
use App\Models\GradoAcademico;
use App\Models\Persona;
use App\Models\Programa;
use App\Models\TipoDocumento;
use App\Models\Ubigeo;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
class Create extends Component
{
    use WithFileUploads;
    // variables
    public $titulo = 'Crear persona';
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
    #[Validate('nullable|file|max:4096|mimes:pdf')]
    public $grado_academico_file;
    #[Validate('nullable|exists:programa,programa_id')]
    public $programa_model = [];
    public $programa;
    #[Validate('nullable|numeric')]
    public $tipo_programa;
    #[Validate('nullable|file|max:4096|mimes:pdf')]
    public $cv_file;

    public function mount()
    {
        if ($this->persona_id) {
            $persona = Persona::find($this->persona_id);
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
            if ($persona->tesista) {
                $this->tipo_perfil = 1;
            } elseif ($persona->docente) {
                $this->tipo_perfil = 2;
            } else {
                $this->tipo_perfil = 0;
            }
            $this->titulo = 'Editar persona';
            $this->modo = 'edit';
        } else {
            $this->persona_id = null;
            $this->titulo = 'Crear persona';
            $this->modo = 'create';
        }
    }

    public function updatedTipoPrograma($value)
    {
        if ($value == null || $value == '') {
            $this->programa = null;
            $this->programa_model = [];
            return;
        }
        $this->programa = null;
        $this->programa_model = Programa::where('programa_tipo', $value == 1 ? 'MAESTRIA' : 'DOCTORADO')
            ->orderBy('programa_nombre', 'asc')
            ->get();
    }

    public function guardar()
    {
        // validamos los campos
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
            'grado_academico_file' => $this->tipo_perfil == 1 ? 'required|file|max:4096|mimes:pdf' : 'nullable',
            'programa' => $this->tipo_perfil == 1 ? 'required|exists:programa,programa_id' : 'nullable',
            'tipo_programa' => $this->tipo_perfil == 1 ? 'required|numeric' : 'nullable',
            'cv_file' => $this->tipo_perfil == 2 ? 'required|file|max:4096|mimes:pdf' : 'nullable',
        ]);
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
                if ($this->grado_academico_file) {
                    $path = 'files/archivos/';
                    $filename = time() . $persona->persona_id . uniqid() . '.' . $this->grado_academico_file->getClientOriginalExtension();
                    $this->grado_academico_file->storeAs($path, $filename, 'public_file');
                }
                $persona->tesista()->create([
                    'programa_id' => $this->programa,
                    'tesista_grado_path' => $path . $filename,
                ]);
            } elseif ($this->tipo_perfil == 2) { // si es docente guardamos sus datos
                if ($this->cv_file) {
                    $path = 'files/archivos/';
                    $filename = time() . $persona->persona_id . uniqid() . '.' . $this->cv_file->getClientOriginalExtension();
                    $this->cv_file->storeAs($path, $filename, 'public_file');
                }
                $persona->docente()->create([
                    'docente_cv_path' => $path . $filename,
                ]);
            }
            // guardamos en sesion el tipo de mensaje y el mensaje
            session([
                'modo' => 'create',
                'tipo' => 'success',
                'mensaje' => 'Persona creado correctamente.'
            ]);
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
                if ($this->grado_academico_file) {
                    $path = 'files/archivos/';
                    $filename = time() . $persona->persona_id . uniqid() . '.' . $this->grado_academico_file->getClientOriginalExtension();
                    $this->grado_academico_file->storeAs($path, $filename, 'public_file');
                }
                $persona->tesista()->create([
                    'programa_id' => $this->programa,
                    'tesista_grado_path' => $path . $filename,
                ]);
            } elseif ($this->tipo_perfil == 2) { // si es docente guardamos sus datos
                if ($this->cv_file) {
                    $path = 'files/archivos/';
                    $filename = time() . $persona->persona_id . uniqid() . '.' . $this->cv_file->getClientOriginalExtension();
                    $this->cv_file->storeAs($path, $filename, 'public_file');
                }
                $persona->docente()->create([
                    'docente_cv_path' => $path . $filename,
                ]);
            }
            // guardamos en sesion el tipo de mensaje y el mensaje
            session([
                'modo' => 'create',
                'tipo' => 'success',
                'mensaje' => 'Persona editada correctamente.'
            ]);
        }
        // redireccionamos
        return redirect()->route('persona');
    }

    public function render()
    {
        $tipo_documento_model = TipoDocumento::where('tipo_documento_estado', 1)->get();
        $genero_model = Genero::where('genero_estado', 1)->get();
        $grado_academico_model = GradoAcademico::where('grado_academico_estado', 1)->get();
        $ubigeo_model = Ubigeo::where('ubigeo_estado', 1)->get();
        return view('livewire.persona.create', [
            'tipo_documento_model' => $tipo_documento_model,
            'genero_model' => $genero_model,
            'grado_academico_model' => $grado_academico_model,
            'ubigeo_model' => $ubigeo_model
        ])->title($this->titulo);
    }
}
