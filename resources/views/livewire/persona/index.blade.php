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
                        @if (auth()->user()->permiso('persona-create'))
                            <a href="{{ route('persona-create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Crear persona
                            </a>
                            <a href="{{ route('persona-create') }}" class="btn btn-primary d-sm-none btn-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a>
                        @endif
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
            @if (session('modo') === 'create' || session('modo') === 'edit')
                <div wire:init="mostrar_toast"></div>
            @endif
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
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="{{ asset($item->avatar) }}" alt="avatar" class="avatar">
                                                    <span class="fw-bold">
                                                        {{ $item->nombre_completo }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $item->persona_documento }}
                                            </td>
                                            <td>
                                                @if ($item->usuario)
                                                    <span
                                                        class="badge {{ getColorRol($item->usuario->usuario_id) }} px-3 py-2">
                                                        {{ $item->usuario->rol->rol_nombre }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-red-lt px-3 py-2">
                                                        SIN ROL
                                                    </span>
                                                @endif
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
                                                    <button type="button"
                                                        wire:click="asignar_usuario({{ $item->persona_id }})"
                                                        data-bs-toggle="modal" data-bs-target="#modal-asignar-usuario"
                                                        class="btn btn-outline-cyan btn-sm">
                                                        Asignar Usuario
                                                    </button>
                                                    @if (auth()->user()->permiso('persona-edit'))
                                                        <a href="{{ route('persona-edit', ['persona_id' => $item->persona_id]) }}"
                                                            class="btn btn-outline-azure btn-sm">
                                                            Editar
                                                        </a>
                                                    @endif
                                                    @if (auth()->user()->permiso('persona-delete'))
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            disabled wire:confirm="¿Quieres eliminar este persona?"
                                                            wire:click="delete({{ $item->persona_id }})">
                                                            Eliminar
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        @if ($personas->count() == 0 && $search != '')
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center"
                                                        style="padding-bottom: 5rem; padding-top: 5rem;">
                                                        <span class="text-secondary">
                                                            No se encontraron resultados para
                                                            "<strong>{{ $search }}</strong>"
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-center"
                                                        style="padding-bottom: 5rem; padding-top: 5rem;">
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
                                        Mostrando {{ $personas->firstItem() }} - {{ $personas->lastItem() }} de
                                        {{ $personas->total() }} registros
                                    </div>
                                    <div class="mt-3">
                                        {{ $personas->links() }}
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center text-secondary">
                                        Mostrando {{ $personas->firstItem() }} - {{ $personas->lastItem() }} de
                                        {{ $personas->total() }} registros
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal" id="modal-asignar-usuario" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $titulo_modal }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="limpiar_modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-lg-12 mt-2 text-center">
                            @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" alt="avatar" class="avatar avatar-lg">
                            @elseif ($avatar_temp)
                                <img src="{{ asset($avatar_temp) }}" alt="avatar" class="avatar avatar-lg">
                            @else
                                @php
                                    $persona = App\Models\Persona::find($persona_id);
                                @endphp
                                @if ($persona)
                                    <img src="{{ asset($persona->avatar) }}" alt="avatar"
                                        class="avatar avatar-lg ">
                                @endif
                            @endif
                        </div>
                        <div class="col-lg-12">
                            <label for="correo_electronico" class="form-label required">
                                Correo electrónico
                            </label>
                            <input type="email"
                                class="form-control @error('correo_electronico') is-invalid @enderror"
                                id="correo_electronico" wire:model.live="correo_electronico"
                                placeholder="Ingrese su correo electrónico" />
                            @error('correo_electronico')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="contraseña"
                                class="form-label @if ($modo == 'create') required @endif">
                                Contraseña
                            </label>
                            <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                                id="contraseña" wire:model.live="contraseña" placeholder="Ingrese su contraseña" />
                            @error('contraseña')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="confirmar_contraseña"
                                class="form-label @if ($modo == 'create') required @endif">
                                Confirmación de Contraseña
                            </label>
                            <input type="password"
                                class="form-control @error('confirmar_contraseña') is-invalid @enderror"
                                id="confirmar_contraseña" wire:model.live="confirmar_contraseña"
                                placeholder="Ingrese su confirmación de contraseña" />
                            @error('confirmar_contraseña')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="rol" class="form-label required">
                                Rol
                            </label>
                            <select type="password" class="form-select @error('rol') is-invalid @enderror"
                                id="rol" wire:model.live="rol">
                                <option value="">Seleccione un rol</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->rol_id }}">{{ $item->rol_nombre }}</option>
                                @endforeach
                            </select>
                            @error('rol')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="avatar" class="form-label">
                                Avatar
                            </label>
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                id="avatar" wire:model.live="avatar" accept="image/*" />
                            @error('avatar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                <div class="modal-footer">
                    <a href="#" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        wire:click="limpiar_modal">
                        Cancelar
                    </a>
                    <button type="button" wire:click="guardar" class="btn btn-primary ms-auto">
                        {{ $boton_modal }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
