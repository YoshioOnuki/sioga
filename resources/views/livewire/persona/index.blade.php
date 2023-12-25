<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Personas</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Personas
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button type="button" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            wire:click="create" data-bs-target="#modal-persona">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Crear persona
                        </button>
                        <button type="button" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            wire:click="create" data-bs-target="#modal-persona" aria-label="Crear persona">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="alert alert-info bg-info-lt m-0 mb-3 fw-bold animate__animated animate__fadeIn animate__faster">
                A continuación se muestra la lista de personas registrados en el sistema.
            </div>
            <div class="row g-3">
                <div class="col-12">
                    <div class="card animate__animated animate__fadeIn animate__faster">
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                                <div class="text-secondary">
                                    Mostrar
                                    <div class="mx-2 d-inline-block">
                                        <select wire:model.live="mostrar_paginate" class="form-select form-select-sm">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    entradas
                                </div>
                                <div class="ms-auto text-secondary">
                                    Buscar:
                                    <div class="ms-2 d-inline-block">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model.live.debounce.500ms="search" aria-label="Search invoice">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap table-striped  datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1">No.</th>
                                        <th>Apellidos y Nombres</th>
                                        <th>Documento</th>
                                        <th>Rol</th>
                                        <th>F. Creación</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($personas as $item)
                                    <tr>
                                        <td>
                                            <span class="text-secondary">{{ $item->persona_id }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">
                                                {{ $item->nombre_completo }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $item->persona_documento }}
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ getRolByPersonaId($item->persona_id)['rol_color'] }} px-3 py-2">
                                                {{ getRolByPersonaId($item->persona_id)['rol_nombre'] }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ formatFechaHoras($item->created_at) }}
                                        </td>
                                        <td>
                                            @if ($item->persona_estado == 1)
                                            <span class="status status-teal px-3 py-2">
                                                <span class="status-dot status-dot-animated"></span>
                                                Activo
                                            </span>
                                            @else
                                            <span class="status status-red px-3 py-2">
                                                <span class="status-dot status-dot-animated"></span>
                                                Inactivo
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-list flex-nowrap justify-content-end">
                                                <button type="button" class="btn btn-outline-azure btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#modal-persona"
                                                    wire:click="edit({{ $item->persona_id }})">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger" disabled
                                                    wire:confirm="¿Quieres eliminar este persona?"
                                                    wire:click="delete({{ $item->persona_id }})">
                                                    Eliminar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @if ($personas->count() == 0 && $search != '')
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center" style="padding-bottom: 5rem; padding-top: 5rem;">
                                                <span class="text-secondary">
                                                    No se encontraron resultados para "<strong>{{ $search }}</strong>"
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center" style="padding-bottom: 5rem; padding-top: 5rem;">
                                                <span class="text-secondary">
                                                    No hay personas registrados
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer {{ $personas->hasPages() ? 'py-0' : '' }}">
                            @if ($personas->hasPages())
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center text-secondary">
                                    Mostrando {{ $personas->firstItem() }} - {{ $personas->lastItem() }} de {{
                                    $personas->total()}} registros
                                </div>
                                <div class="mt-3">
                                    {{ $personas->links() }}
                                </div>
                            </div>
                            @else
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center text-secondary">
                                    Mostrando {{ $personas->firstItem() }} - {{ $personas->lastItem() }} de {{
                                    $personas->total()}} registros
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal persona --}}
    <div class="modal" id="modal-persona" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $title_modal }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="limpiar_modal"></button>
                </div>
                <form autocomplete="off" novalidate wire:submit="guardar">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <label for="tipo_documento" class="form-label required">
                                    Tipo de documento
                                </label>
                                <select class="form-select @error('tipo_documento') is-invalid @enderror"
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
                                <input type="number" class="form-control @error('documento') is-invalid @enderror"
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
                                <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
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
                                <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror"
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
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" wire:model.live="nombre" placeholder="Ingrese su nombre" />
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
                                <select class="form-select @error('genero') is-invalid @enderror" id="genero"
                                    wire:model.live="genero">
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
                                <select class="form-select @error('grado_academico') is-invalid @enderror"
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
                            <div class="col-lg-12">
                                <label for="ubigeo" class="form-label required">
                                    Ubigeo
                                </label>
                                <select class="form-select @error('ubigeo') is-invalid @enderror" id="ubigeo"
                                    wire:model.live="ubigeo">
                                    <option value="">
                                        Seleccione un ubigeo
                                    </option>
                                    @foreach ($ubigeo_model as $item)
                                    <option value="{{ $item->ubigeo_id }}">
                                        {{ $item->ubigeo_codigo }} / {{ $item->ubigeo_departamento }} / {{
                                        $item->ubigeo_provincia }} / {{ $item->ubigeo_distrito }}
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
                                        <input type="radio" wire:model.live="tipo_perfil" value="0"
                                            class="form-selectgroup-input" />
                                        <span class="form-selectgroup-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
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
                                        <input type="radio" wire:model.live="tipo_perfil" value="1"
                                            class="form-selectgroup-input" />
                                        <span class="form-selectgroup-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                                <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                            </svg>
                                            Tesista
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" wire:model.live="tipo_perfil" value="2"
                                            class="form-selectgroup-input" />
                                        <span class="form-selectgroup-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
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
                                        <input class="form-check-input @error('estado') is-invalid @enderror"
                                            type="checkbox" wire:model.live="estado">
                                        <span class="form-check-label">Activo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($tipo_perfil == 1)
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <span class="fw-bold fs-3">
                                    Perfil Tesista
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <label for="grado_academico_file" class="form-label required">
                                    Grado Academico
                                </label>
                                <input type="file"
                                    class="form-control @error('grado_academico_file') is-invalid @enderror"
                                    id="grado_academico_file" wire:model.live="grado_academico_file"
                                    accept="application/pdf" />
                                @error('grado_academico_file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="programa" class="form-label required">
                                    Programa
                                </label>
                                <select class="form-select @error('programa') is-invalid @enderror" id="programa"
                                    wire:model.live="programa">
                                    <option value="">
                                        Seleccione un programa
                                    </option>
                                </select>
                                @error('programa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($tipo_perfil == 2)
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <span class="fw-bold fs-3">
                                    Perfil Docente
                                </span>
                            </div>
                            <div class="col-lg-12">
                                <label for="cv_file" class="form-label required">
                                    Curriculum Vitae
                                </label>
                                <input type="file" class="form-control @error('cv_file') is-invalid @enderror"
                                    id="cv_file" wire:model.live="cv_file" accept="application/pdf" />
                                @error('cv_file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                            wire:click="limpiar_modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary ms-auto">
                            {{ $button_modal }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
{{-- <script>
    document.addEventListener('livewire:navigated', () => {
        $(document).ready(function() {
            // tom select ubigeo
            var ubigeo = new TomSelect('#ubigeo', {
                create: false,
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                placeholder: 'Seleccione un ubigeo'
            });
            $('#ubigeo').on('change', function(event) {
                @this.set('ubigeo', ubigeo.getValue());
            });
        });
    });
</script> --}}
@endpush
