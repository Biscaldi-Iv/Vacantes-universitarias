@extends('base')

@section('titulo')
    <title>Inicio de sesion</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/login">Inicio de sesion</a>
    </p>
@endsection

@section('contenido')
    <div class="container mt-4 shadow"
    style="width:30%; padding:auto; margin-top: 30%; margin-bottom: 10%; border-radius:10px;">
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" id="email"
                value="{{ old('email') }}" placeholder="Correo electronico">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sesion</button>
            <a class="btn btn-light w-100" name="registrarse" href="/registrarse">Registrarse</a>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
