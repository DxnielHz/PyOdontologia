
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
            </div>
            <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                    class="fa fa-search"></i></button>
            <a href="RegistrarCita.php" class="btn btn-primary py-2 px-4 ms-3">Registre su cita</a>
    
            <!-- Usuario dropdown -->
            <div class="nav-item dropdown ms-3">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user me-2"></i>Usuario
                </a>
                <div class="dropdown-menu dropdown-menu-end m-0">
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalitoLog">Login</a>
                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalitoReg">Regístrate</a>
                </div>
            </div>
        </div>
    </nav>

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
                                                <input type="text" id="username" placeholder="Username"
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

                                        <form id="registerForm">
                                            <p class="text-center">Regístrate para continuar</p>

                                            <div class="form-outline mb-4">
                                                <input type="email" id="email" placeholder="Correo" class="form-control"
                                                    required>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="text" id="newUsername" placeholder="Username"
                                                    class="form-control" required>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password" id="newPassword" class="form-control"
                                                    placeholder="Contraseña" required>
                                            </div>

                                            <div class="d-flex flex-column align-items-center pt-1 mb-5 pb-1">
                                                <button
                                                    class="btn btn-block text-white fa-lg gradient-custom-2 mb-3 w-100 register-btn"
                                                    type="submit">Regístrate</button>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-center pb-4">
                                                <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
                                                <button type="button" class="btn btn-outline-morado"
                                                    data-bs-toggle="modal" data-bs-target="#modalitoLog">Inicia sesión
                                                    acá</button>
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

    <div class="container py-4">
        <div class="RegistrarCita-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
            data-wow-delay="0.6s">
            <h1 class="text-white mb-4">Reserva tu cita</h1>
            <form action="registrocita.php" method="POST" id="formCita">
    <div class="row g-3">
        <!-- Tratamiento -->
        <div class="col-12 col-sm-6">
            <select class="form-select bg-light border-0" style="height: 55px;" name="tratamiento" required>
                <option selected disabled>Selecciona tu tratamiento</option>
                <?php
                include 'conexion.php'; // Conexión a la base de datos

                // Consulta para obtener los tratamientos
                $sqlTratamientos = "SELECT id_tratamiento, nombre FROM tratamientos";
                $stmtTratamientos = $conn->prepare($sqlTratamientos);
                $stmtTratamientos->execute();
                $tratamientos = $stmtTratamientos->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tratamientos as $tratamiento) {
                    echo '<option value="' . $tratamiento['id_tratamiento'] . '">' . $tratamiento['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- Doctor -->
        <div class="col-12 col-sm-6">
            <select class="form-select bg-light border-0" style="height: 55px;" name="doctor" required>
                <option selected disabled>Selecciona tu doctor</option>
                <?php
                // Consulta para obtener los doctores
                $sqlDoctores = "SELECT id_doctor, nombre FROM doctores";
                $stmtDoctores = $conn->prepare($sqlDoctores);
                $stmtDoctores->execute();
                $doctores = $stmtDoctores->fetchAll(PDO::FETCH_ASSOC);

                foreach ($doctores as $doctor) {
                    echo '<option value="' . $doctor['id_doctor'] . '">' . $doctor['nombre'] . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- Nombre -->
        <div class="col-12 col-sm-6">
            <input type="text" class="form-control bg-light border-0" placeholder="Tu nombre" name="nombre" style="height: 55px;" required>
        </div>

        <!-- Correo -->
        <div class="col-12 col-sm-6">
            <input type="email" class="form-control bg-light border-0" placeholder="Tu correo" name="correo" style="height: 55px;" required>
        </div>

        <!-- Fecha -->
        <div class="col-12 col-sm-6">
            <div class="date" id="date1" data-target-input="nearest">
                <input type="date" class="form-control bg-light border-0 datetimepicker-input" placeholder="Fecha de la cita" name="fecha" style="height: 55px;" required>
            </div>
        </div>

        <!-- Hora -->
        <div class="col-12 col-sm-6">
            <div class="time" id="time1" data-target-input="nearest">
                <input type="time" class="form-control bg-light border-0 datetimepicker-input" placeholder="Hora de la cita" name="hora" style="height: 55px;" required>
            </div>
        </div>

        <!-- Botón de envío -->
        <div class="col-12">
            <button class="btn btn-dark w-100 py-3" type="submit">Haz tu reservación</button>
        </div>
    </div>
</form>

<!-- Script para SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Escuchar el evento de submit del formulario
    document.getElementById('formCita').addEventListener('submit', function (e) {
        e.preventDefault();  // Evitar que el formulario se envíe de forma predeterminada

        // Aquí puedes hacer el proceso de envío del formulario con AJAX si es necesario
        // O simplemente continuar sin redirección

        // Mostrar la alerta de éxito
        Swal.fire({
            position: "center",  // Centrar la alerta
            icon: "success",
            title: "Cita Registrada",
            showConfirmButton: false,
            timer: 1500
        });

        // Opcional: Si se desea procesar el formulario, usar AJAX para enviarlo sin recargar la página
        var form = document.getElementById("formCita");
        var formData = new FormData(form);

        fetch('registrocita.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Aquí puedes manejar la respuesta si es necesario
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

        </div>
    </div>

    <div class="container-fluid bg-dark text-light py-5 wow fadeInUp mt-4" data-wow-delay="0.3s" style="margin-top: -75px;">
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

    <script src="js/main.js"></script>
    <script src="js/login.js"></script>
    <script src="js/register.js"></script>

</body>
</html>