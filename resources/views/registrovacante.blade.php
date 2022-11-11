<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrarse</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/estilos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
    <body>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">Vacantes Universitarias</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top shadow">
            <div class="container">
                <div class="row-6 text-center">
                    <a class="navbar-brand" href="/maquetas/index.html">Inicio</a>
                    <a class="navbar-brand" href="#!">Universidades</a>
                    <a class="navbar-brand" href="/maquetas/vacantes.html">Vacantes actuales</a>
                    <a class="navbar-brand" href="/maquetas/FAQ.html">Preguntas frecuentes</a>
                </div>
                <div class="row-4 text-left">
                    <a class="btn btn-primary" href="#">Ingresar</a>
                    <a class="btn btn-secondary" href="/maquetas/registrarse.html">Registrarse</a>
                </div>
            </div>
        </nav>
        <!-- Navigation-->

        <!-- Body -->
        
        <div class="container w-75 bg-white shadow mt-5 mb-5 ">
            <div class="col-xl-8 p-2">
                <h2 class="fw-bold text-left my-3 ">Registrar vacante</h2>
            </div>
            <div class="row p-2 ">
                <div class="col-md-10 mx-auto ">
                    <form>
                        <!-- Falta cambiar los id -->
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="inputFirstname">Título vacante</label>
                                <input type="text" class="form-control" id="inputFirstname" placeholder="Análisis matemático I">
                            </div>
                            <div class="col-sm-6 p-2">
                                <!-- Podría ser un droplist -->
                                <label for="inputFirstname">Universidad</label>
                                <input type="text" class="form-control" id="inputFirstname" placeholder="Universidad Tecnológica nacional">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="inputLastname">Título</label>
                                <input type="text" class="form-control" id="inputLastname" placeholder="Profesor de matemática universitaria">
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="inputCity">Horario</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="Lunes y miércoles de 7:15 a 9:00">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="email">Periodo</label>
                                <input type="text" class="form-control" id="inputEmail" placeholder="3 meses">
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="inputContactNumber">Otros</label>
                                <input type="number" class="form-control" id="inputContactNumber" placeholder="Más info">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary px-4">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">Acerca de</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contacto</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terminos de uso</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Política de privacidad</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Vacantes Universitarias 2022. Todos los derechos reservados.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>