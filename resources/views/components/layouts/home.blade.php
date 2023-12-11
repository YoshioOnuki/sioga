<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title ?? 'SIOGA - Sistema de Obtención de Grado Académico - Escuela de Posgrado - UNU' }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('logo-dark-ico.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
    <script>
        var defaultThemeMode = "light";
            var themeMode;
            if ( document.documentElement ) {
                if ( document.documentElement.hasAttribute("data-bs-theme-mode"))
                {
                    themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
                }
                else
                {
                    if ( localStorage.getItem("data-bs-theme") !== null )
                    {
                        themeMode = localStorage.getItem("data-bs-theme");
                    }
                    else
                    {
                        themeMode = defaultThemeMode;
                    }
                }
                if (themeMode === "system")
                {
                    themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
                }
                document.documentElement.setAttribute("data-bs-theme", themeMode);
            }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
                style="background-image: url(assets/media/illustrations/landing.svg)">
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-equal">
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                    <i class="ki-outline ki-abstract-14 fs-2hx"></i>
                                </button>
                                <a href="/" class="me-5">
                                    <img alt="Logo" src="media/unu.png" class="h-45px h-lg-50px rounded-1" />
                                </a>
                                <a href="/" class="me-5">
                                    <img alt="Logo" src="media/logo-pg.png" class="h-45px h-lg-50px rounded-1" />
                                </a>
                                <a href="/">
                                    <img alt="Logo" src="media/logo-dark.PNG"
                                        class="logo-default h-45px h-lg-50px rounded-1" />
                                    <img alt="Logo" src="media/logo-light.PNG"
                                        class="logo-sticky h-45px h-lg-50px rounded-1" />
                                </a>
                                <a href="/">
                                    <div class="d-flex align-items-center w-lg-250px ms-3">
                                        <div class="d-flex flex-column">
                                            <span class="logo-default fs-2x menu-title-gray-600 text-white"
                                                style="font-weight: 800;">
                                                SIOGA
                                            </span>
                                            <span class="logo-sticky fs-2x menu-title-gray-600 text-dark"
                                                style="font-weight: 800;">
                                                SIOGA
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true"
                                    data-kt-drawer-name="landing-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                    data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                        id="kt_landing_menu">
                                        <div class="menu-item">
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#funciona"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">¿Cómo
                                                funciona?</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#mision-vision"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Misión /
                                                Visión</a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#manuales"
                                                data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Manuales /
                                                Documentos</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-equal text-end ms-1">
                                {{-- <a href="{{ route('login') }}" class="btn btn-success">Iniciar Sesión</a> --}}
                                <a href="" class="btn btn-success">Iniciar Sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                        <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Sistema de Obtención de Grado
                            Académico
                            <br />
                            <span
                                style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                <span id="kt_landing_hero_text">Universidad Nacional de Ucayali</span>
                            </span>
                        </h1>
                        <a href="#" class="btn btn-primary">Regístrate aquí</a>
                    </div>
                </div>
            </div>
            <!--curva-->
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>

        <div class="py-10 py-lg-20">
            <div class="container">
                <div class="text-center mb-12">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="funciona" data-kt-scroll-offset="{default: 100, lg: 150}">
                        ¿Cómo funciona?</h3>
                    <div class="fs-5 text-muted fw-bold">
                        Aproveche un sistema para guiar su proyecto de tesis desde la propuesta inicial hasta la
                        sustentación
                        <br />
                        final, asegurando un proceso eficiente y estructurado para alcanzar su meta académica.
                        <br />
                        <br />
                    </div>
                </div>
                <div class="tns tns-default" style="direction: ltr">
                    <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                        data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                        data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                        data-tns-prev-button="#kt_team_slider_prev_1" data-tns-next-button="#kt_team_slider_next_1"
                        data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Registro de Proyecto de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Inicie sesión en el sistema y registre su
                                    <br />proyecto de tesis, incluyendo su asesor, el
                                    <br />título, y línea de investigación. Una vez
                                    <br />enviado, su proyecto será validado
                                    <br />por su asesor para comenzar
                                    <br />con las revisiones.

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Revisión y Retroalimentación</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Luego posiblemente recibirá obsevaciones
                                    <br />de su asesor y de un comité de revisión. Utilice
                                    <br />el sistema para hacer seguimiento de las
                                    <br />revisiones y subir versiones actualizadas
                                    <br />de su proyecto. Asegúrese de atender
                                    <br />todas las observaciones.
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Sustentación de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Después de la aprobación del proyecto,
                                    <br />prepare y suba su proyecto final al sistema,
                                    <br />programe la sustentación, y durante ella,
                                    <br />sustente su investigación ante el comité
                                    <br />evaluador. La aprobación de la sustentación
                                    <br />resultará en la obtención de su grado académico.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">4</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Registro de Proyecto de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Inicie sesión en el sistema y registre su
                                    <br />proyecto de tesis, incluyendo su asesor, el
                                    <br />título, y línea de investigación. Una vez
                                    <br />enviado, su proyecto será validado
                                    <br />por su asesor para comenzar
                                    <br />con las revisiones.

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">5</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Revisión y Retroalimentación</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Luego posiblemente recibirá obsevaciones
                                    <br />de su asesor y de un comité de revisión. Utilice
                                    <br />el sistema para hacer seguimiento de las
                                    <br />revisiones y subir versiones actualizadas
                                    <br />de su proyecto. Asegúrese de atender
                                    <br />todas las observaciones.
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">6</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Sustentación de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Después de la aprobación del proyecto,
                                    <br />prepare y suba su proyecto final al sistema,
                                    <br />programe la sustentación, y durante ella,
                                    <br />sustente su investigación ante el comité
                                    <br />evaluador. La aprobación de la sustentación
                                    <br />resultará en la obtención de su grado académico.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">7</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Registro de Proyecto de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Inicie sesión en el sistema y registre su
                                    <br />proyecto de tesis, incluyendo su asesor, el
                                    <br />título, y línea de investigación. Una vez
                                    <br />enviado, su proyecto será validado
                                    <br />por su asesor para comenzar
                                    <br />con las revisiones.

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">8</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Revisión y Retroalimentación</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Luego posiblemente recibirá obsevaciones
                                    <br />de su asesor y de un comité de revisión. Utilice
                                    <br />el sistema para hacer seguimiento de las
                                    <br />revisiones y subir versiones actualizadas
                                    <br />de su proyecto. Asegúrese de atender
                                    <br />todas las observaciones.
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 px-5">
                            <div class="text-center mb-10 mb-md-0">
                                <img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
                                <div class="d-flex flex-center mb-5">
                                    <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">9</span>
                                    <div class="fs-5 fs-lg-3 fw-bold text-gray-900">Sustentación de Tesis</div>
                                </div>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                                    Después de la aprobación del proyecto,
                                    <br />prepare y suba su proyecto final al sistema,
                                    <br />programe la sustentación, y durante ella,
                                    <br />sustente su investigación ante el comité
                                    <br />evaluador. La aprobación de la sustentación
                                    <br />resultará en la obtención de su grado académico.
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev_1">
                        <i class="ki-outline ki-left fs-2x"></i>
                    </button>
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next_1">
                        <i class="ki-outline ki-right fs-2x"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-sm-n10">
            <!--Curva-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <div class="landing-dark-bg">
                <div class="container">
                    <div class="d-flex flex-center">
                        <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-user-tick fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Usuarios registrados</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-chart-pie-4 fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="440">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Proyectos de Tesis
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-chart-pie-4 fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="340">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Proyectos Finales de Tesis
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-time fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="110">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Pendientes</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-verify fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="311">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Sustentados</span>
                                </div>
                            </div>

                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                                style="background-image: url('assets/media/svg/misc/octagon.svg')">
                                <i class="ki-outline ki-teacher fs-2tx text-white mb-3"></i>
                                <div class="mb-0">
                                    <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="276">0
                                        </div>
                                    </div>
                                    <span class="text-gray-600 fw-semibold fs-5 lh-0">Graduados</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Curva-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                        fill="currentColor"></path>
                </svg>
            </div>
        </div>

        <div class="py-10 py-lg-20 mb-10">
            <div class="container">
                <div class="text-center mb-12">
                    <h3 class="fs-2hx text-gray-900 mb-5" id="mision-vision"
                        data-kt-scroll-offset="{default: 100, lg: 150}"></h3>
                </div>
                <div class="tns tns-default" style="direction: ltr">
                    <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000"
                        data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true"
                        data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                        data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next"
                        data-tns-responsive="{1200: {items: 1}, 992: {items: 1}}">
                        <div class="col-md-12 px-5">
                            <div class="text-center mb-10 mb-md-0 ms-15 me-15">
                                <img src="assets/media/illustrations/sketchy-1/mision.png" class="mh-250px mb-9"
                                    alt="" />
                                <br>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted ms-20 me-20">
                                    Promueve, orienta y regula el desarrollo de los posgrados académicos de la UNU,
                                    garantizando
                                    su excelencia académica para la generación de competencias de alto nivel en
                                    investigación
                                    científica, docencia universitaria, y el mejor desempeño de profesionales altamente
                                    calificados en ciencias, tecnología y humanidades con sensibilidad social.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 px-5">
                            <div class="text-center mb-10 mb-md-0 ms-15 me-15">
                                <img src="assets/media/illustrations/sketchy-1/vision.png" class="mh-250px mb-9"
                                    alt="" />
                                <br>
                                <div class="fw-semibold fs-6 fs-lg-4 text-muted ms-20 me-20">
                                    La Escuela de Posgrado de la Universidad Nacional de Ucayali es referente nacional y
                                    latinoamericano en el desarrollo de posgrado de alto nivel y excelencia académica en
                                    las
                                    áreas de competencia de la UNU. Es reconocida como institución nacional que
                                    desarrolla
                                    investigaciones y aporta nuevos conocimientos que promueven y es líder en el
                                    desarrollo
                                    sostenible de la Región, comprometida con la conservación y preservación del medio
                                    ambiente.
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev">
                        <i class="ki-outline ki-left fs-2x"></i>
                    </button>
                    <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next">
                        <i class="ki-outline ki-right fs-2x"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="mb-lg-n15 position-relative z-index-2">
            <div class="container">
                <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <div class="card-body p-lg-20">
                        <div class="text-center mb-5 mb-lg-10">
                            <h3 class="fs-2hx text-gray-900 mb-5" id="manuales"
                                data-kt-scroll-offset="{default: 100, lg: 250}">Manuales y Documentos</h3>
                        </div>

                        <div class="d-flex flex-center mb-5 mb-lg-15">
                            <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Manual para
                                        Tesistas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#"
                                        data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Manual
                                        para Docentes</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_landing_projects_latest">
                                <div class="row g-10">
                                    <div class="col-lg-6">
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            href="assets/media/illustrations/manual/manual_pregrado_tesista.png"
                                            target="_blank">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-300px"
                                                style="background-image:url('assets/media/illustrations/manual/manual_pregrado_tesista.png')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-outline ki-folder-down fs-4x text-white"></i>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-6">
                                        <!--data-fslightbox="lightbox-projects" === abrir imagen-->
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            href="assets/media/illustrations/manual/manual_posgrado_tesista.png"
                                            target="_blank">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-300px"
                                                style="background-image:url('assets/media/illustrations/manual/manual_posgrado_tesista.png')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-outline ki-folder-down fs-4x text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_landing_projects_web_design">
                                <div class="row g-10">
                                    <div class="col-lg-6">
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            href="assets/media/illustrations/manual/manual_pregrado_docente.png"
                                            target="_blank">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-300px"
                                                style="background-image:url('assets/media/illustrations/manual/manual_pregrado_docente.png')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-outline ki-folder-down fs-4x text-white"></i>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-lg-6">
                                        <a class="d-block card-rounded overlay h-lg-100"
                                            href="assets/media/illustrations/manual/manual_posgrado_docente.png"
                                            target="_blank">
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-300px"
                                                style="background-image:url('assets/media/illustrations/manual/manual_posgrado_docente.png')">
                                            </div>
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="ki-outline ki-folder-down fs-4x text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Footer-->
        <div class="mt-sm-n20">
            <!--Curva-->
            <div class="landing-curve landing-dark-color">
                <svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z"
                        fill="currentColor"></path>
                </svg>
            </div>
            <div class="pt-20 landing-dark-bg">
                <div class="container">
                    <div class="row py-10 py-lg-20">
                        <div class="col-lg-12 ps-lg-16">
                            <div class="d-flex justify-content-start">
                                <div class="d-flex fw-semibold flex-column me-20 ms-20">
                                    <h4 class="fw-bold text-gray-500 mb-10">Contáctanos</h4>
                                    <a href="https://www.facebook.com/EscuelaPosgradoUnu"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</a>
                                    <a href="https://www.unu.edu.pe/posgrado/index.php"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Página Web -
                                        Posgrado</a>
                                    <a href="https://www.unu.edu.pe/portal/"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Universidad Nacional
                                        de Ucayali</a>
                                </div>
                                <div class="d-flex fw-semibold flex-column ms-lg-20 me-20">
                                    <h4 class="fw-bold text-gray-500 mb-10">Mantente conectado</h4>
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Preguntas más
                                        frecuentes</a>
                                    <a href="#"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaciones</a>
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Tutoriales de
                                        vídeo</a>
                                </div>
                                <div class="d-flex fw-semibold flex-column ms-lg-20 me-20">
                                    <h4 class="fw-bold text-gray-500 mb-10">Mantente conectado</h4>
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Preguntas más
                                        frecuentes</a>
                                    <a href="#"
                                        class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentaciones</a>
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Tutoriales de
                                        vídeo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="landing-dark-separator"></div>
                <div class="container">
                    <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                        <div class="d-flex align-items-center order-2 order-md-1">
                            <span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="#">
                                &copy; {{ date('Y') }} Todos los derechos reservados | SIOGA |
                                <a href="https://www.unu.edu.pe/posgrado/" target="_blank">Escuela de Posgrado</a>
                            </span>
                        </div>
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                            <li class="menu-item">
                                <a class="menu-link px-2">Acerca de</a>
                            </li>
                            <li class="menu-item mx-5">
                                <a class="menu-link px-2">Apoyo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-outline ki-arrow-up"></i>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>

    <!--Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
    <script src="assets/js/custom/landing.js"></script>
    <script src="assets/js/custom/pages/pricing/general.js"></script>
</body>

</html>
