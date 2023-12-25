<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Configuración</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Roles</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Roles
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('configuracion-rol-create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Crear rol
                        </a>
                        <a href="{{ route('configuracion-rol-create') }}" class="btn btn-primary d-sm-none btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="alert alert-info bg-info-lt m-0 mb-3 fw-bold animate__animated animate__fadeIn animate__faster">
                A continuación se muestra la lista de roles registrados en el sistema.
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
                                        <th>Rol</th>
                                        <th>F. Creación</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $item)
                                    <tr>
                                        <td>
                                            <span class="text-secondary">{{ $item->rol_id }}</span>
                                        </td>
                                        <td>
                                            <span class="fw-bold">
                                                {{ $item->rol_nombre }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ formatFechaHoras($item->created_at) }}
                                        </td>
                                        <td>
                                            @if ($item->rol_estado == 1)
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
                                                    data-bs-toggle="modal" data-bs-target="#modal-rol"
                                                    wire:click="edit({{ $item->rol_id }})">
                                                    Editar
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                    wire:confirm="¿Quieres eliminar este rol?"
                                                    wire:click="delete({{ $item->rol_id }})">
                                                    Eliminar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    @if ($roles->count() == 0 && $search != '')
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
                                                    No hay roles registrados
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer {{ $roles->hasPages() ? 'py-0' : '' }}">
                            @if ($roles->hasPages())
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center text-secondary">
                                    Mostrando {{ $roles->firstItem() }} - {{ $roles->lastItem() }} de {{
                                    $roles->total()}} registros
                                </div>
                                <div class="mt-3">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                            @else
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center text-secondary">
                                    Mostrando {{ $roles->firstItem() }} - {{ $roles->lastItem() }} de {{
                                    $roles->total()}} registros
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal rol --}}
    <div class="modal" id="modal-rol" tabindex="-1" wire:ignore.self>
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
                            <div class="col-lg-12">
                                <label for="nombre" class="form-label required">
                                    Nombre
                                </label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" wire:model.live="nombre" placeholder="Ingrese su nombre" />
                                @error('nombre')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <div class="form-label">Estado</div>
                                <div>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('estado') is-invalid @enderror" type="checkbox" wire:model.live="estado">
                                        <span class="form-check-label">Activo</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="form-label">
                                    Permisos
                                </div>
                                <div class="row g-1">
                                    <div class="col-lg-12">
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" wire:model.live="seleccionar_todo">
                                            <span class="form-check-label">
                                                Seleccionar todos
                                            </span>
                                        </label>
                                    </div>
                                    @foreach ($permisos as $item)
                                        <div class="col-lg-3 col-sm-6" wire:key="{{ $item->permiso_id }}">
                                            <label class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" wire:model.live="permiso" value="{{ $item->permiso_id }}">
                                                <span class="form-check-label">
                                                    {{ $item->permiso_nombre }}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
