<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="index.php" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="index.php" class="nav-item nav-link active">Home</a>
            <a href="nosotros.php" class="nav-item nav-link">Acerca de nosotros</a>
            <a href="service.php" class="nav-item nav-link">Servicio</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Paginas</a>
                <div class="dropdown-menu m-0">
                    <a href="price.php" class="dropdown-item">Nuestras ofertas</a>
                    <a href="team.php" class="dropdown-item">Nuestros dentistas</a>
                    <a href="testimonial.php" class="dropdown-item">Testimonios</a>
                    <a href="RegistrarCita.php" class="dropdown-item">Registre su cita</a>
                </div>
            </div>
            <a href="contacto.php" class="nav-item nav-link">Contacto</a>
            
            <!-- Mostrar el enlace al panel de administración solo si el usuario es administrador -->
            <?php if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] === 'administrador'): ?>
                <a href="administracion.php" class="nav-item nav-link">Panel Administrativo</a>
            <?php endif; ?>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="RegistrarCita.php" class="btn btn-primary py-2 px-4 ms-3">Registre su cita</a>

        <!-- Usuario dropdown -->
        <div class="nav-item dropdown ms-3">
            <?php if (isset($_SESSION['nombre'])): ?>
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-2"></i><?php echo htmlspecialchars($_SESSION['nombre']); ?>
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="logout.php" class="dropdown-item">Cerrar sesión</a>
                </div>
            <?php else: ?>
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-2"></i>Usuario
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalitoLog">Login</a>
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalitoReg">Regístrate</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>


    <!-- modal de busqueda -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent text-white border-primary p-3"
                            placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Iniciar Sesión -->
    <div class="modal fade" id="modalitoLog" tabindex="-1" aria-labelledby="modalitoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container py-3">
                        <div class="card text-white rounded-3 text-black" style="background-color: #ffb74d;">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="card-body p-md-4 mx-md-3">
                                        <div class="text-center">
                                            <img src="img/logo.jpg" style="width: 185px;" alt="logo">
                                        </div>

                                        <form id="loginForm">
    <p class="text-center">Inicia sesión para continuar</p>

    <div data-mdb-input-init class="form-outline mb-3">
        <input type="text" id="email" placeholder="Correo electrónico"
            class="form-control" required>
    </div>

    <div data-mdb-input-init class="form-outline mb-3">
        <input type="password" id="password" class="form-control"
            placeholder="Contraseña" required>
    </div>

    <div class="d-flex flex-column align-items-center pt-1 mb-4 pb-1">
        <button
            class="btn btn-block text-white fa-lg gradient-custom-2 mb-2 w-100 login-btn"
            type="submit">Login</button>
        <a class="text-muted w-100 text-center" href="#!">
            <h6 class="text-white">Olvidaste tu contraseña?</h6>
        </a>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-3">
        <p class="mb-0 me-2">No tienes cuenta?</p>
        <button type="button" class="btn btn-outline-morado"
            data-bs-toggle="modal"
            data-bs-target="#modalitoReg">Registrate</button>
    </div>
</form>


                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-3 mx-md-3">
                                        <h4 class="mb-3">Nos verte nuevamente por aquí</h4>
                                        <p class="small mb-0">Confía en nosotros para cuidar de tu sonrisa. Contamos con
                                            los mejores profesionales para hacerte sentir seguro y cómodo durante tu
                                            visita.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Registro -->
    <div class="modal fade" id="modalitoReg" tabindex="-1" aria-labelledby="modalitoLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container py-3">
                        <div class="card text-white rounded-3 text-black" style="background-color: #86bcb7;">
                            <div class="row g-0">
                                <div class="col-lg-6 d-none d-lg-flex align-items-center gradient-custom-2">
                                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                        <h4 class="mb-4">DentCare</h4>
                                        <p class="small mb-0">Descubre una nueva experiencia en cuidado dental, diseñada
                                            para brindarte comodidad y confianza. Comparte tu sonrisa con el mundo y
                                            disfruta de una atención personalizada y profesional. ¡Visítanos y empieza a
                                            lucir tu mejor sonrisa!</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body p-md-5 mx-md-4">
                                        <div class="text-center">
                                            <img src="img/logo.jpg" style="width: 185px;" alt="logo">
                                        </div>

                                        <form id="registerForm" class="container mt-5">
    <p class="text-center">Regístrate para continuar</p>

    <div class="form-outline mb-3">
        <input type="text" id="nombre" class="form-control" placeholder="Nombre completo" required>
    </div>

    <div class="form-outline mb-3">
        <input type="email" id="email" class="form-control" placeholder="Correo electrónico" required>
    </div>

    <div class="form-outline mb-3">
        <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
    </div>

    <div class="form-outline mb-3">
        <input type="text" id="telefono" class="form-control" placeholder="Teléfono" required>
    </div>

    <div class="form-outline mb-3">
        <input type="text" id="direccion" class="form-control" placeholder="Dirección" required>
    </div>

    <div class="d-flex flex-column align-items-center pt-1 mb-5 pb-1">
        <button type="submit" class="btn btn-primary w-100">Regístrate</button>
    </div>

    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalitoLog">
            Inicia sesión acá
        </button>
    </div>
</form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Carrusel de imágenes -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Primera diapositiva -->
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Mantén Tus Dientes
                                Saludables</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">TEN EL MEJOR TRATO DENTAL</h1>
                            <!-- Botones con el formulario modal -->
                            <button type="button" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"
                                data-bs-toggle="modal" data-bs-target="#citaModal">Agenda tu cita</button>
                            <button type="button" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight"
                                data-bs-toggle="modal" data-bs-target="#citaModal">Contáctanos</button>
                        </div>
                    </div>
                </div>
                <!-- Segunda diapositiva -->
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Mantén Tus Dientes
                                Saludables</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">TEN EL MEJOR TRATO DENTAL</h1>
                            <!-- Botones con el formulario modal -->
                            <button type="button" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"
                                data-bs-toggle="modal" data-bs-target="#citaModal">Agenda tu cita</button>
                            <button type="button" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight"
                                data-bs-toggle="modal" data-bs-target="#citaModal">Contáctanos</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controles del carrusel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Modal del Formulario de Cita -->
    <div class="modal fade" id="citaModal" tabindex="-1" aria-labelledby="citaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Encabezado del Modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="citaModalLabel">Formulario de Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Cuerpo del Modal -->
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" placeholder="tuemail@ejemplo.com"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono"
                                placeholder="Ingrese su número de teléfono" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de la cita</label>
                            <input type="date" class="form-control" id="fecha" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- banner de informaciones -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Nuestro horario</h3>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Lu - Vi</h6>
                            <p class="mb-0"> 8:00am - 9:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Sabados</h6>
                            <p class="mb-0"> 9:00am - 7:00pm</p>
                        </div>
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">Domingos</h6>
                            <p class="mb-0"> 9:00am - 5:00pm</p>
                        </div>
                        <a class="btn btn-light" href="">Agenda tu cita</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Busca a tu doctor</h3>
                        <div class="date mb-3" id="date" data-target-input="nearest">
                            <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                placeholder="Dia de la cita" data-target="#date" data-toggle="datetimepicker"
                                style="height: 40px;">
                        </div>
                        <select class="form-select bg-light border-0 mb-3" style="height: 40px;">
                            <option selected>Servicio</option>
                            <option value="1">Limpieza de dientes</option>
                            <option value="2">Retiro de brackets</option>
                            <option value="3">Putas a 1 sol</option>
                        </select>
                        <a class="btn btn-light" href="">Buscar doctor</a>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Agenda tu cita tambien</h3>
                        <p class="text-white">Por nuestros numeros de contactos, llamanos o escribenos al whatsapp y
                            pregunta por los doctores o horarios disponibles</p>
                        <h3 class="text-white mb-0">+51 982 221 202</h3>
                        <h3 class="text-white mb-0">+51 971 388 128</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- servicios dentales -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="img/before.jpg" style="object-fit: cover;">
                        <img class="position-absolute w-100 h-100" src="img/after.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Nuestros servicios</h5>
                        <h1 class="display-5 mb-0">Ofrecemos La Mejor Calidad De Servicio Dental</h1>
                    </div>
                    <div class="row g-5">
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-1.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Odontología cosmética</h5>
                            </div>
                        </div>
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.9s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-2.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Implante de postizos</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-7">
                    <div class="row g-5">
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.3s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-3.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">Colocación de brackets</h5>
                            </div>
                        </div>
                        <div class="col-md-6 service-item wow zoomIn" data-wow-delay="0.6s">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" src="img/service-4.jpg" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0">LImpieza de dientes</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
                    <div
                        class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                        <h3 class="text-white mb-3">Haz tu cita</h3>
                        <p class="text-white mb-3">Crea tu cita a travez de la pagina web o comunicate por los
                            siguientes canales</p>
                        <h3 class="text-white mb-0">+51 982 221 202</h3>
                        <h3 class="text-white mb-0">+51 971 388 128</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Reserva tu cita -->
    <div class="container-fluid bg-primary bg-RegistrarCita my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">Somos una clínica dental certificada y segura en la que
                            puedes confiar.</h1>
                        <p class="text-white mb-0">
                            En nuestra clínica, te ofrecemos atención personalizada y un ambiente seguro, respaldado por
                            especialistas comprometidos con tu salud y bienestar. Utilizamos tecnología avanzada y los
                            mejores procedimientos para garantizar resultados óptimos en todos nuestros tratamientos,
                            desde limpiezas hasta ortodoncia. No pospongas tu salud dental; agenda tu cita hoy y
                            descubre por qué tantos confían en nosotros para cuidar su sonrisa. </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="RegistrarCita-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Reserva tu cita</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Selecciona tu servicio</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Selecciona tu doctor</option>
                                        <option value="1">Doctor 1</option>
                                        <option value="2">Doctor 2</option>
                                        <option value="3">Doctor 3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Tu nombre"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Tu correo"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Fecha de la cita" data-target="#date1"
                                            data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="time" id="time1" data-target-input="nearest">
                                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                            placeholder="Hora de la cita" data-target="#time1"
                                            data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Haz tu reservación</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nuestros doctores -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">Nuestros Dentistas</h5>
                        <h1 class="display-6 mb-4">Conoce a Nuestros Doctores Certificados</h1>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-1.jpg" alt="">
                            <div
                                class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-2.jpg" alt="">
                            <div
                                class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-3.jpg" alt="">
                            <div
                                class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-4.jpg" alt="">
                            <div
                                class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-5.jpg" alt="">
                            <div
                                class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square m-1" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Para poder enviarse correos -->
    <div class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="bg-primary p-5">
                <form class="mx-auto" style="max-width: 600px;">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Tu correo">
                        <button class="btn btn-dark px-4">Registrate</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
        <div class="container pt-5">
            <div class="row g-5 pt-4">
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Quick Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>nosotros
                            Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                            Blog</a>
                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Popular Links</h3>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>nosotros
                            Us</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                            Services</a>
                        <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                            Blog</a>
                        <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@example.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+012 345 67890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h3 class="text-white mb-4">Follow Us</h3>
                    <div class="d-flex">
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="#"><i
                                class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-lg btn-primary btn-lg-square rounded" href="#"><i
                                class="fab fa-instagram fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ email, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect; // Redirige al index
        } else {
            alert(data.message); // Muestra error
        }
    })
    .catch(error => console.error("Error:", error));
});

    </script>

<script>
    document.getElementById("registerForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const telefono = document.getElementById("telefono").value;
    const direccion = document.getElementById("direccion").value;

    fetch("registro.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ nombre, email, password, telefono, direccion })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            window.location.href = "index.php"; // Redirige al index
        } else {
            alert(data.message); // Muestra el mensaje de error
        }
    })
    .catch(error => console.error("Error:", error));
});

</script>
    <script src="js/main.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>

</body>

</html>