<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">
                                    Revision - Proyecto para Jurado
                                </a>
                            </li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Revision - Proyecto para Jurado
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        {{-- @if (auth()->user()->permiso('persona-create'))
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
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-3">
                <div class="col-lg-7">
                    <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                        <div class="card-body">
                            <embed src="{{ asset('files/B9_2023_UNU_SISTEMAS_2022_T_DANY-RIOS_DAVID-TUESTA_V1.pdf') }}"
                                class="rounded" type="application/pdf" width="100%" height="750px" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                        <div class="card-header bg-cyan-lt">
                            <h3 class="card-title fw-semibold">
                                Información del Proyecto
                            </h3>
                        </div>
                        <div class="card-body row g-3 mb-0">
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <strong>Código Proyecto:</strong> 2024-001
                                </div>
                                <div>
                                    <strong>Linea de Inv.:</strong> GESTION DE TECNOLOGÍA DE LA INVESTIGACIÓN
                                </div>
                                <div>
                                    <strong>Programa Académico:</strong> INGENIERÍA DE SISTEMAS
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        Mensaje a enviar:
                                    </label>
                                    <small class="form-hint">
                                        Indique el motivo por el cual el proyecto no es aceptado.
                                    </small>
                                    <textarea rows="3" class="form-control">
                                    </textarea>
                                </div>
                                <div class="bg-red-lt py-3 px-4 rounded mb-2" role="alert">
                                    <div class="d-flex">
                                        <div>
                                            <strong>Nota 1:</strong> En caso tenga observaciones o cuando termine de
                                            realizar las observaciones, no se olvide de finalizar la revisión.
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-orange-lt py-3 px-4 rounded" role="alert">
                                    <div class="d-flex">
                                        <div>
                                            <strong>Nota 2:</strong> En caso no tenga observaciones, dar en finalizar y
                                            se considera aprobado por usted.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" wire:click="añadir_observacion"
                                    class="btn btn-success">
                                    Añadir Observación
                                </button>
                                <button type="button"
                                    class="btn btn-pink"
                                    wire:click="finalizar"
                                    wire:confirm="¿Quieres finalizar la revisión de este Proyecto de Tesis?"
                                    >
                                    Finalizar Revisión
                                </button>
                                <button type="button" wire:click="salir"
                                    wire:confirm="¿Quieres salir de la Asesoría de este Proyecto de Tesis?"
                                    class="btn btn-secondary">
                                    Salir
                                </button>
                            </div>
                            @if (count($array) > 0)
                            <hr class="mt-4 mb-0">
                            <div>
                                <span class="fw-bold fs-2">
                                    Observaciones:
                                </span>
                                <div class="mt-2">
                                    @foreach ($array as $item)
                                    <div class="alert alert-info" role="alert">
                                        <h4 class="alert-title">24/01/2024 07:12 pm:</h4>
                                        <div class="text-secondary">
                                            El tercer objetivo sea mas claro y conciso con lo
                                            que plantea en su proyecto.
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
