<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">Configuración</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('configuracion-rol') }}">Roles</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $titulo }}</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        {{ $titulo }}
                    </h2>
                </div>
                {{-- <div class="col-auto ms-auto d-print-none">
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
                </div> --}}
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-5">
                <div class="col-12">
                    <div class="card card-stacke animate__animated animate__fadeIn animate__faster">
                        <form wire:submit="guardar">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label class="col-3 col-form-label required">
                                        Nombre
                                    </label>
                                    <div class="col">
                                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                            placeholder="Ingrese el nombre del rol" wire:model="nombre">
                                        @error('nombre')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-3 col-form-label pt-0">
                                        Estado
                                    </label>
                                    <div class="col">
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input @error('estado') is-invalid @enderror"
                                                type="checkbox" wire:model.live="estado">
                                            <span class="form-check-label">Activo</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-3 col-form-label pt-0">
                                        Permisos
                                    </label>
                                    <div class="col">
                                        <div class="row g-1">
                                            <div class="col-lg-12">
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox"
                                                        wire:model.live="seleccionar_todo">
                                                    <span class="form-check-label">
                                                        Seleccionar todos
                                                    </span>
                                                </label>
                                            </div>
                                            @foreach ($permisos as $item)
                                                <div class="col-lg-3 col-sm-6" wire:key="{{ $item->permiso_id }}">
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            wire:model.live="permiso" value="{{ $item->permiso_id }}">
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
                            <div class="card-footer text-end">
                                <a href="{{ route('configuracion-rol') }}" class="btn btn-secondary">
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
