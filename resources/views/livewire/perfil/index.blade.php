<div>
    <div class="page-header d-print-none animate__animated animate__fadeIn animate__faster">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Perfil</a></li>
                        </ol>
                    </div>
                    <h2 class="page-title text-uppercase">
                        Perfil
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
                <div class="col-lg-4">
                    <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="w-full text-end mb-2">
                                <span class="badge {{ getColorRol($usuario->usuario_id) }}">
                                    {{ $usuario->rol->rol_nombre }}
                                </span>
                            </div>
                            <img src="{{ asset($usuario->avatar) }}" alt="avatar" class="avatar avatar-lg">
                            <span class="fw-bold fs-3 mt-3 text-center">
                                {{ $usuario->persona->solo_primeros_nombres }}
                            </span>
                            @if ($usuario->rol->rol_nombre == 'DOCENTE' || $usuario->rol->rol_nombre == 'TESISTA')
                                <div class="w-full mt-3">
                                    <table class="table table-vcenter table-bordered">
                                        <thead>
                                            {{-- Docente --}}
                                            @if ($usuario->rol->rol_nombre == 'DOCENTE')
                                                <tr>
                                                    <td class="text-center w-50">
                                                        <div class="display-6 fw-bold mb-2">
                                                            0
                                                        </div>
                                                        <span class="status status-blue fw-bold">
                                                            Proyectos
                                                        </span>
                                                    </td>
                                                    <td class="text-center w-50">
                                                        <div class="display-6 fw-bold mb-2">
                                                            0
                                                        </div>
                                                        <span class="status status-blue fw-bold">
                                                            Asesor
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{-- Estudiante --}}
                                            @if ($usuario->rol->rol_nombre == 'TESISTA')
                                                <tr>
                                                    <td class="text-center w-50">
                                                        <div class="display-6 fw-bold mb-2">
                                                            0
                                                        </div>
                                                        <span class="status status-blue fw-bold">
                                                            Número de proceso
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        </thead>
                                    </table>
                                </div>
                            @endif
                            <div class="divide-y w-full mt-3 mb-2">
                                <div class="row">
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-mail" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            {{ $usuario->usuario_correo }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-id-badge-2" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 12h3v4h-3z" />
                                            <path
                                                d="M10 6h-6a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h16a1 1 0 0 0 1 -1v-12a1 1 0 0 0 -1 -1h-6" />
                                            <path
                                                d="M10 3m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                            <path d="M14 16h2" />
                                            <path d="M14 12h4" />
                                        </svg>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            {{ $usuario->persona->persona_documento }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-school" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                        </svg>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            {{ $usuario->persona->grado_academico->grado_academico_nombre }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-address-book" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                                            <path d="M10 16h6" />
                                            <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                            <path d="M4 8h3" />
                                            <path d="M4 12h3" />
                                            <path d="M4 16h3" />
                                        </svg>
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            {{ $usuario->rol->rol_nombre }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                                <div class="card-header {{ getColorRol($usuario->usuario_id) }}">
                                    <h3 class="card-title">
                                        Información personal
                                    </h3>
                                    <div class="card-actions btn-actions">
                                        <a href="{{ route('perfil-edit', ['usuario_id' => $usuario->usuario_id]) }}"
                                            class="btn">
                                            Editar
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="divide-y w-full my-2">
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-user-square" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M9 10a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                    <path d="M6 21v-1a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v1" />
                                                    <path
                                                        d="M3 5a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-14z" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Nombre:
                                                    </strong>{{ ucwords(strtolower($usuario->persona->nombre_completo)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-mail" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                                    <path d="M3 7l9 6l9 -6" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Correo Electrónico:
                                                    </strong>{{ $usuario->usuario_correo }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-id-badge-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 12h3v4h-3z" />
                                                    <path
                                                        d="M10 6h-6a1 1 0 0 0 -1 1v12a1 1 0 0 0 1 1h16a1 1 0 0 0 1 -1v-12a1 1 0 0 0 -1 -1h-6" />
                                                    <path
                                                        d="M10 3m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                    <path d="M14 16h2" />
                                                    <path d="M14 12h4" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Documento:
                                                    </strong>{{ $usuario->persona->persona_documento }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-school" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Grado Académico:
                                                    </strong>{{ ucwords(strtolower($usuario->persona->grado_academico->grado_academico_nombre)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-award" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 9m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" />
                                                    <path d="M12 15l3.4 5.89l1.598 -3.233l3.598 .232l-3.4 -5.889" />
                                                    <path d="M6.802 12l-3.4 5.89l3.598 -.233l1.598 3.232l3.4 -5.889" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Rol:
                                                    </strong>{{ ucwords(strtolower($usuario->rol->rol_nombre)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-gender-agender" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 12m-6 0a6 6 0 1 0 12 0a6 6 0 1 0 -12 0" />
                                                    <path d="M7 12h11" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Genero:
                                                    </strong>{{ ucwords(strtolower($usuario->persona->genero->genero_nombre)) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-location" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" />
                                                </svg>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate">
                                                    <strong>Ubigeo:
                                                    </strong>{{ ucwords(strtolower(getUbigeo($usuario->persona->ubigeo_id))) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($tesista)
                            <div class="col-12">
                                <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                                    <div class="card-header {{ getColorRol($usuario->usuario_id) }}">
                                        <h3 class="card-title">
                                            Información del Tesista
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="divide-y w-full my-2">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-books" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path
                                                            d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path d="M5 8h4" />
                                                        <path d="M9 16h4" />
                                                        <path
                                                            d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                                        <path d="M14 9l4 -1" />
                                                        <path d="M16 16l3.923 -.98" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Programa Académico:
                                                        </strong>
                                                        @if ($tesista->programa->programa_mencion)
                                                            {{ ucwords(strtolower($tesista->programa->programa_tipo)) }}
                                                            en
                                                            {{ ucwords(strtolower($tesista->programa->programa_nombre)) }}
                                                            con Mención en
                                                            {{ ucwords(strtolower($tesista->programa->programa_mencion)) }}
                                                        @else
                                                            {{ ucwords(strtolower($tesista->programa->programa_tipo)) }}
                                                            en
                                                            {{ ucwords(strtolower($tesista->programa->programa_nombre)) }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($docente)
                            <div class="col-12">
                                <div class="card card-stacked animate__animated animate__fadeIn animate__faster">
                                    <div class="card-header {{ getColorRol($usuario->usuario_id) }}">
                                        <h3 class="card-title">
                                            Información del Docente
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="divide-y w-full my-2">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-file-description"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                                        <path
                                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                                        <path d="M9 17h6" />
                                                        <path d="M9 13h6" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Currículum Vitae:
                                                        </strong>
                                                        @if ($docente->docente_cv_path)
                                                            <span class="badge badge-outline text-green">
                                                                Subido
                                                            </span>
                                                            <a href="{{ asset($docente->docente_cv_path) }}"
                                                                target="_blank" class="badge badge-outline text-blue">
                                                                Ver
                                                            </a>
                                                        @else
                                                            <span class="badge badge-outline text-red">
                                                                No subido
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-books" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path
                                                            d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                                                        <path d="M5 8h4" />
                                                        <path d="M9 16h4" />
                                                        <path
                                                            d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                                                        <path d="M14 9l4 -1" />
                                                        <path d="M16 16l3.923 -.98" />
                                                    </svg>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Lineas de Investigación:
                                                        </strong>
                                                        Proximamente...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
