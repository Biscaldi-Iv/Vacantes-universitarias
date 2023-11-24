@extends('base')

@section('titulo')
    <title>Mapa del sitio</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/map">Mapa del sitio</a>
    </p>
@endsection

@section('contenido')
    <div class="d-flex">
        <div class="flex-shrink-0">
            <img src="/img/mapa.png" alt="Diagrama del sitio" width="75%">
        </div>
        <div class="flex-grow-1 ms-3">
            <h5 class="mt-0">AcademyHub</h5>
            <p>A continuacion se enumeraran algunos de los enlaces del diagrama del sitio, separados de acuerdo a sus restricciones de acceso:</p>
            <h6>De acceso libre</h6>
            <ul>
                <li><a class="enlace" href="/">Pagina principal</a></li>
                <li><a class="enlace" href="/login">Inicio de sesion</a></li>
                <li><a class="enlace" href="/registrarse">Registrarse</a></li>
                <li><a class="enlace" href="/universidades">Universidades</a></li>
                <li><a class="enlace" href="/about">Acerca de nosotros</a></li>
                <li><a class="enlace" href="/faq">Preguntas frecuentes</a></li>
                <li><a class="enlace" href="/terms">Terminos y condiciones</a></li>
                <li><a class="enlace" href="/privacy">Politica de privacidad</a></li>
                <li><a class="enlace" href="#">Mapa del sitio</a></li>
            </ul>
            <h6>Para postulantes</h6>
            <ul>
                <li><a class="enlace" href="/datospostulante">Perfil profesional</a></li>
            </ul>
            <h6>Para personal universitario</h6>
            <ul>
                <li><a class="enlace" href="/catedrasU">Cátedras</a></li>
            </ul>
            <h6>Para administradores</h6>
            <ul>
                <li><a class="enlace" href="/admin/usuarios">Usuarios</a></li>
            </ul>
            <p>El sitio cuenta con otras secciones pero para poder acceder a ellas es necesario navegar a traves del sitio</p>
      </div>
    </div>


@endsection

@section('scripts')
@endsection
