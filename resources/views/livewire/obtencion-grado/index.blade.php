<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Obtención de Grado Académico</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Obtención de Grado Académico
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            @if (session('modo') === 'create' || session('modo') === 'edit')
            <div wire:init="mostrar_toast"></div>
            @endif
            <div class="row g-3">
                <div class="col-lg-12">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                                <div class="card-header">
                                    <ul class="nav nav-pills card-header-pills">
                                        <li class="nav-item">
                                            <a href="#proyecto-tesis" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab" tabindex="-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-upload me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M14 20h-8a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                                    <path d="M11 16h-5a2 2 0 0 0 -2 2" />
                                                    <path d="M15 16l3 -3l3 3" />
                                                    <path d="M18 13v9" />
                                                </svg>
                                                Proyecto de Tesis
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#borrador-tesis" class="nav-link" data-bs-toggle="tab" aria-selected="true" role="tab" tabindex="-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-2 me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                                                    <path d="M19 16h-12a2 2 0 0 0 -2 2" />
                                                    <path d="M9 8h6" />
                                                </svg>
                                                Borrador de Tesis
                                            </a>
                                        </li>
                                        <li class="nav-item ms-auto">
                                            <a class="nav-link" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="proyecto-tesis" class="card tab-pane active show" role="tabpanel">
                                        <div class="card-body">
                                            <div class="card-title">Registro de Proyecto de Tesis</div>
                                            <div class="row g-3 mb-3">
                                                <div class="col-lg-6">
                                                    <label for="codigo" class="form-label required">
                                                        Código de Tesista
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('codigo') is-invalid @enderror"
                                                        id="codigo" wire:model.live="codigo"
                                                        placeholder="Ingrese su código" />
                                                    @error('codigo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6" wire:ignore>
                                                    <label for="asesor" class="form-label required">
                                                        Asesor
                                                    </label>
                                                    <input type="text"
                                                        class="form-control @error('asesor') is-invalid @enderror"
                                                        id="asesor" wire:model.live="asesor"
                                                        placeholder="Seleccione su asesor" />
                                                    @error('asesor')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row g-3 mb-3">
                                                <div class="col-md">
                                                    <label for="titulo-proyecto" class="form-label required">
                                                        Título de Proyecto de Tesis
                                                    </label>
                                                    <textarea class="form-control @error('titulo-proyecto') is-invalid @enderror"
                                                        id="titulo-proyecto" wire:model.live="titulo-proyecto" placeholder="Ingrese el título de su proyecto"></textarea>
                                                    @error('titulo-proyecto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md">
                                                    <label for="proyecto" class="form-label required">
                                                        Seleccione su archivo
                                                    </label>
                                                    <input type="file" class="form-control @error('proyecto') is-invalid @enderror"
                                                        id="proyecto" wire:model.live="proyecto" accept="image/*" />
                                                    @error('proyecto')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-transparent mt-auto">
                                            <div class="btn-list justify-content-end">
                                                <button type="submit" class="btn btn-primary">
                                                    Registrar Proyecto de Tesis
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="borrador-tesis" class="card tab-pane" role="tabpanel">
                                        <div class="card-body">
                                            <div class="card-title">Registro de Borrador de Tesis</div>
                                            <p class="text-secondary">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                                            </p>
                                            <div class="card-footer bg-transparent mt-auto">
                                                <div class="btn-list justify-content-end">
                                                    <button type="submit" class="btn btn-primary">
                                                        Registrar Borrador de Tesis
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
