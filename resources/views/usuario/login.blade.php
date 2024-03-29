@extends('base')

@section('titulo')
    <title>Inicio de sesion</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/login">Inicio de sesion</a>
    </p>
@endsection

@section('contenido')
    <div class="container mt-4 shadow"
        style="width:30%; padding:40px; margin-top: 30%; margin-bottom: 10%; border-radius:10px;">
        <form action="/login" method="POST" style="margin-top:20px; margin-bottom:20px;" id="form-login">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                    placeholder="Correo electronico" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña"
                    required>
            </div>
            <div class="mb-3">
                <div class="g-recaptcha" data-sitekey={{ env('CAPTCHA_SITE_KEY') }}></div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sesion</button>
            <button type="button" class="btn btn-light w-100" name="registrarse"
                onclick="location.href='/registrarse'">Registrarse</button>
            <button type="button" class="btn btn-light w-100" name="reestablecer"
                onclick="location.href='/contraseña/olvidada'">Has olvidado tu contraseña?</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("form-login").submit();
        }
    </script>
@endsection
