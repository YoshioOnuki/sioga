<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIOGA - Sistema de Obtención de Grado Académico - Escuela de Posgrado - UNU</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="/" class="logo"><img src="/media/logo-dark.PNG" class="img-fluid"></a>
                <a href="/">SIOGA</a>
            </h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#funciona">¿Como Funciona?</a></li>
                    <li><a class="nav-link scrollto" href="#mision-vision">Misión / Visión</a></li>
                    <li><a class="nav-link scrollto o" href="#manuales-docs">Manuales / Documentos</a></li>
                    <li><a class="getstarted" href="{{ route('login') }}">Iniciar Sesión</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Sistema de Obtención de Grado Académico</h1>
                    <h2>Universidad Nacional de Ucayali</h2>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn-get-started-success">Registrarse</a>
            </div>
        </div>
    </section>

    <main id="main">

        <section id="funciona" class="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>¿CÓMO FUNCIONA?</h2>
                    <p>
                        Aproveche un sistema para guiar su proyecto de tesis desde la propuesta inicial hasta la sustentación
                        final, asegurando un proceso eficiente y estructurado para alcanzar su meta académica
                        .</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">1</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">2</span>
                                    Revisión y Retroalimentación
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Luego posiblemente recibirá obsevaciones de su asesor y de un comité de revisión. Utilice el sistema para hacer seguimiento de las revisiones y subir versiones actualizadas de su proyecto. Asegúrese de atender todas las observaciones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">3</span>
                                    Sustentación de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Después de la aprobación del proyecto, prepare y suba su proyecto final al sistema, programe la sustentación, y durante ella, sustente su investigación ante el comité evaluador. La aprobación de la sustentación resultará en la obtención de su grado académico.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">4</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">5</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">6</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">7</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">8</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <h3>
                                    <span class="badge badge-light-success badge-pill">9</span>
                                    Registro de Proyecto de Tesis
                                </h3>
                                <img src="assets/img/2.png" class="testimonial-img" alt="">
                                <p>
                                    Inicie sesión en el sistema y registre su proyecto de tesis, incluyendo su asesor, el título, y línea de investigación. Una vez enviado, su proyecto será validado por su asesor para comenzar con las revisiones.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>

        <section id="mision-vision" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Misión / Visión</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue">
                            <div class="icon">
                                <img src="assets/img/mision.png" class="mision-vision"/>
                            </div>
                            <h4><a href="">Misión</a></h4>
                            <p>
                                Promueve, orienta y regula el desarrollo de los posgrados académicos de la UNU, garantizando
                                su excelencia académica para la generación de competencias de alto nivel en
                                investigación científica, docencia universitaria, y el mejor desempeño de profesionales altamente
                                calificados en ciencias, tecnología y humanidades con sensibilidad social.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box iconbox-orange ">
                            <div class="icon">
                                <img src="assets/img/vision.png" class="mision-vision"/>
                            </div>
                            <h4><a href="">Visión</a></h4>
                            <p>
                                La Escuela de Posgrado de la Universidad Nacional de Ucayali es referente nacional y 
                                latinoamericano en el desarrollo de posgrado de alto nivel y excelencia académica en
                                las áreas de competencia de la UNU. Es reconocida como institución nacional que
                                desarrolla investigaciones y aporta nuevos conocimientos que promueven y es líder en el
                                desarrollo sostenible de la Región, comprometida con la conservación y preservación del medio ambiente.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section id="manuales-docs" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Manuales y Documentos</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">Todo</li>
                            <li data-filter=".filter-app">Manual para Tesista</li>
                            <li data-filter=".filter-web">Manual para Docents</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="300">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <footer id="footer">
        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>SIOGA</span></strong>. Todos los derechos reservados
                </div>
                <div class="credits">
                    Desarrollado por <a href="">Escuela de Posgrado</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#"><i class="bx bxl-facebook"></i></a>
                <a href="#"><i class='bx bx-world' ></i></a>
            </div>
        </div>
    </footer>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
