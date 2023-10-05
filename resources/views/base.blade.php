<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('titulo')
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="img/Vacantes.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="/css/estilos.css" rel="stylesheet" />
        <!-- Minified Bootstrap CSS
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        Minified JS library
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         Minified Bootstrap JS
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <style>
        .breadcrumb, .enlace{
            display: inline;
            color:black;
        }
        .breadcrumb:hover, .enlace:hover{
            display: inline;
            color: blue;
            text-decoration: underline;
        }
        .breadcrumb:active, .enlace:active{
            display: inline;
            color: blue;
            text-decoration: underline;
        }
        </style>
    </head>
    <body>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative" />
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top shadow">
            <div class="container">
                <div class="row-6 text-center">
                    <a class="navbar-brand" href="/">Inicio</a>
                    <a class="navbar-brand" href="/universidades">Universidades</a>
                    @auth
                    @if(auth()->user()->privilegio==2)
                        <a class="navbar-brand" href="/catedrasU">Catedras</a>
                    @endif
                    @if(auth()->user()->privilegio==3)
                        <a class="navbar-brand" href="/admin/usuarios">Usuarios</a>
                    @endif
                    @endauth
                    <a class="navbar-brand" href="/faq">Preguntas frecuentes</a>
                </div>
                <div class="row-4 text-left">
                @auth
                    <div class="dropdown open">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Cuenta
                        </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            @if (auth()->user()->privilegio==1)
                                <a class="dropdown-item" href="/usuario/perfil/{{auth()->user()->id}}">Ver perfil</a>
                                <a class="dropdown-item" href="/datospostulante">Editar perfil profesional</a>
                            @endif
                            <a class="dropdown-item bg-danger text-white" href="/logout">Cerrar sesion</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <button class="btn btn-primary" name="login"  onclick='location.href="/login"'>Ingresar</button>
                    <button class="btn btn-secondary" name="registrarse" onclick="location.href='/registrarse'">Registrarse</button>
                @endguest
                </div>
            </div>
        </nav>
        <!-- Navigation-->

        <!-- Body -->

        <div class="container w-75 bg-white shadow mt-5 mb-5">
            @yield('breadcrumb')
            @if (session('error'))
                <h5 class="alert alert-danger"><strong>ERROR!</strong> {{ session('error') }}</h5>
            @elseif(session('success'))
                <h5 class="alert alert-success"><strong>HECHO!</strong> {{ session('success') }}</h5>
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
                            <li class="list-inline-item"><a href="/about" class="links">Acerca de</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!" class="links">Contacto</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/terms" class="links">Terminos de uso</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="/privacy" class="links">Política de privacidad</a></li>
                            <li class="list-inline-item"><a href="/map" class="links">Mapa del sitio</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">
                            &copy; AcademyHub 2022. Todos los derechos reservados.
                        </p>
                    </div>
                    <!--div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0"></ul>
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
                    </div-->
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
