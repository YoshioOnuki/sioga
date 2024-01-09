<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('persona') }}">Personas</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="#">{{ $titulo }}</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        {{ $titulo }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="alert alert-info bg-info-lt m-0 mb-3 fw-bold animate__animated animate__fadeIn animate__faster">
                A continuación usted podrá registrar una nueva persona, para ello deberá completar todos los campos
            </div>
            <div class="row g-5">
                <div class="col-12">
                    <div class="card card-stacke animate__animated animate__fadeIn animate__faster">
                        <form wire:submit="guardar">
                            <div class="card-body">
                                <div class="row py-2">
                                    <label class="col-3 col-form-label">
                                        Información personal
                                    </label>
                                    <div class="col">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <label for="tipo_documento" class="form-label required">
                                                    Tipo de documento
                                                </label>
                                                <select
                                                    class="form-select @error('tipo_documento') is-invalid @enderror"
                                                    id="tipo_documento" wire:model.live="tipo_documento">
                                                    <option value="">
                                                        Seleccione un tipo de documento
                                                    </option>
                                                    @foreach ($tipo_documento_model as $item)
                                                        <option value="{{ $item->tipo_documento_id }}">
                                                            {{ $item->tipo_documento_nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('tipo_documento')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="documento" class="form-label required">
                                                    Número de documento
                                                </label>
                                                <input type="number"
                                                    class="form-control @error('documento') is-invalid @enderror"
                                                    id="documento" wire:model.live="documento"
                                                    placeholder="Ingrese su documento: 00000000" />
                                                @error('documento')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="apellido_paterno" class="form-label required">
                                                    Apellido Paterno
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                                                    id="apellido_paterno" wire:model.live="apellido_paterno"
                                                    placeholder="Ingrese su apellido paterno" />
                                                @error('apellido_paterno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="apellido_materno" class="form-label required">
                                                    Apellido Materno
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('apellido_materno') is-invalid @enderror"
                                                    id="apellido_materno" wire:model.live="apellido_materno"
                                                    placeholder="Ingrese su apellido materno" />
                                                @error('apellido_materno')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="nombre" class="form-label required">
                                                    Nombres
                                                </label>
                                                <input type="text"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    id="nombre" wire:model.live="nombre"
                                                    placeholder="Ingrese su nombre" />
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="genero" class="form-label required">
                                                    Genero
                                                </label>
                                                <select class="form-select @error('genero') is-invalid @enderror"
                                                    id="genero" wire:model.live="genero">
                                                    <option value="">
                                                        Seleccione un genero
                                                    </option>
                                                    @foreach ($genero_model as $item)
                                                        <option value="{{ $item->genero_id }}">
                                                            {{ $item->genero_nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('genero')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="grado_academico" class="form-label required">
                                                    Grado Academico
                                                </label>
                                                <select
                                                    class="form-select @error('grado_academico') is-invalid @enderror"
                                                    id="grado_academico" wire:model.live="grado_academico">
                                                    <option value="">
                                                        Seleccione un grado academico
                                                    </option>
                                                    @foreach ($grado_academico_model as $item)
                                                        <option value="{{ $item->grado_academico_id }}">
                                                            {{ $item->grado_academico_nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('grado_academico')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12" wire:ignore>
                                                <label for="ubigeo" class="form-label required">
                                                    Ubigeo
                                                </label>
                                                <select class="form-select @error('ubigeo') is-invalid @enderror"
                                                    id="ubigeo" wire:model.live="ubigeo"
                                                    placeholder="Seleccione un ubigeo">
                                                    <option value="">
                                                        Seleccione un ubigeo
                                                    </option>
                                                    @foreach ($ubigeo_model as $item)
                                                        <option value="{{ $item->ubigeo_id }}">
                                                            {{ $item->ubigeo_codigo }} /
                                                            {{ $item->ubigeo_departamento }} /
                                                            {{ $item->ubigeo_provincia }} /
                                                            {{ $item->ubigeo_distrito }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ubigeo')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="form-label">
                                                    Seleccione el tipo de perfil
                                                </label>
                                                <div class="form-selectgroup">
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" wire:model.live="tipo_perfil"
                                                            value="0" class="form-selectgroup-input" />
                                                        <span class="form-selectgroup-label">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                                                <path d="M19 22v.01" />
                                                                <path
                                                                    d="M19 19a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                                                            </svg>
                                                            Sin Perfil
                                                        </span>
                                                    </label>
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" wire:model.live="tipo_perfil"
                                                            value="1" class="form-selectgroup-input" />
                                                        <span class="form-selectgroup-label">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                                            </svg>
                                                            Tesista
                                                        </span>
                                                    </label>
                                                    <label class="form-selectgroup-item">
                                                        <input type="radio" wire:model.live="tipo_perfil"
                                                            value="2" class="form-selectgroup-input" />
                                                        <span class="form-selectgroup-label">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                                <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" />
                                                                <path d="M12 12l0 .01" />
                                                                <path d="M3 13a20 20 0 0 0 18 0" />
                                                            </svg>
                                                            Docente
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-label">Estado</div>
                                                <div>
                                                    <label class="form-check form-check-inline">
                                                        <input
                                                            class="form-check-input @error('estado') is-invalid @enderror"
                                                            type="checkbox" wire:model.live="estado">
                                                        <span class="form-check-label">Activo</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($tipo_perfil == 1)
                                <div class="card-body">
                                    <div class="row py-2">
                                        <label class="col-3 col-form-label">
                                            Perfil de Tesista
                                        </label>
                                        <div class="col">
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <label for="grado_academico_file" class="form-label @if($modo == 'create') required @endif">
                                                        Grado Academico
                                                    </label>
                                                    <input type="file"
                                                        class="form-control @error('grado_academico_file') is-invalid @enderror"
                                                        id="grado_academico_file"
                                                        wire:model.live="grado_academico_file"
                                                        accept="application/pdf" />
                                                    @error('grado_academico_file')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="tipo_programa" class="form-label required">
                                                        Tipo Programa
                                                    </label>
                                                    <select
                                                        class="form-select @error('tipo_programa') is-invalid @enderror"
                                                        id="tipo_programa" wire:model.live="tipo_programa"
                                                        placeholder="Seleccione un tipo programa">
                                                        <option value="">
                                                            Seleccione un tipo programa
                                                        </option>
                                                        <option value="1">
                                                            Maestria
                                                        </option>
                                                        <option value="2">
                                                            Doctorado
                                                        </option>
                                                    </select>
                                                    @error('tipo_programa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="programa" class="form-label required">
                                                        Programa
                                                    </label>
                                                    <select
                                                        class="form-select @error('programa') is-invalid @enderror"
                                                        id="programa" wire:model.live="programa"
                                                        placeholder="Seleccione un programa">
                                                        <option value="">
                                                            Seleccione un programa
                                                        </option>
                                                        @foreach ($programa_model as $item)
                                                            <option value="{{ $item->programa_id }}">
                                                                @if ($item->programa_mencion)
                                                                    {{ $item->programa_tipo }} //
                                                                    {{ $item->programa_nombre }} //
                                                                    {{ $item->programa_mencion }}
                                                                @else
                                                                    {{ $item->programa_tipo }} //
                                                                    {{ $item->programa_nombre }}
                                                                @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('programa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($tipo_perfil == 2)
                                <div class="card-body">
                                    <div class="row py-2">
                                        <label class="col-3 col-form-label">
                                            Perfil de Docente
                                        </label>
                                        <div class="col">
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <label for="cv_file" class="form-label required">
                                                        Curriculum Vitae
                                                    </label>
                                                    <input type="file"
                                                        class="form-control @error('cv_file') is-invalid @enderror"
                                                        id="cv_file" wire:model.live="cv_file"
                                                        accept="application/pdf" />
                                                    @error('cv_file')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card-footer text-end">
                                <a href="{{ route('persona') }}" class="btn btn-outline-secondary">
                                    Regresar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        document.addEventListener('livewire:navigated', () => {
            $(document).ready(function() {
                // asignar tomselect al select con id ubigeo
                new TomSelect("#ubigeo", {
                    create: false,
                    valueField: 'ubigeo_id',
                    persist: false,
                    allowEmptyOption: true,
                });
                // Livewire.hook('morph.updated', ({
                //     el,
                //     component
                // }) => {
                //     new TomSelect("#ubigeo", {
                //         create: false,
                //         valueField: 'ubigeo_id',
                //         persist: false,
                //         allowEmptyOption: true,
                //     });
                // })
            });
        })
    </script>
@endscript
