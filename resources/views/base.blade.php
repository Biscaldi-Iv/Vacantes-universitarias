<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('titulo')
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/estilos.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
        .breadcrumb{
            display: inline;
            color:black;
        }
        .breadcrumb:hover{
            display: inline;
            color: blue;
            text-decoration: inline;
        }
        .breadcrumb:active{
            display: inline;
            color: blue;
            text-decoration: inline;
        }
        </style>
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
                    <a class="navbar-brand" href="/">Inicio</a>
                    <a class="navbar-brand" href="#">Universidades</a>
                    <a class="navbar-brand" href="/vacantes">Vacantes actuales</a>
                    <a class="navbar-brand" href="/faq">Preguntas frecuentes</a>
                </div>
                <div class="row-4 text-left">
                @if(session('user'))
                    <a class="btn btn-primary" href="#">Editar perfil</a>
                    <a class="btn btn-danger" href="/logout">Cerrar sesion</a>
                @else
                    <a class="btn btn-primary" href="/login">Ingresar</a>
                    <a class="btn btn-secondary" href="/registrarse">Registrarse</a>
                @endif
                </div>
            </div>
        </nav>
        <!-- Navigation-->

        <!-- Body -->

        <div class="container w-75 bg-white shadow mt-5 mb-5">
            @yield('breadcrumb')
            @if (session('error'))
                <h5 class="alert alert-danger">{{ session('error') }}</h5>
            @endif
            @yield('contenido')
        </div>

        <!-- Body -->


        <!-- Footer-->
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
                        <p class="text-muted small mb-4 mb-lg-0">
                            &copy; Vacantes Universitarias 2022. Todos los derechos reservados.
                        </p>
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
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> -->
        @yield('scripts')
    </body>
</html>
