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
        <form>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
            </div>
            <div class="mb-3">
                <label for="contra" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contra" id="contra" placeholder="Contraseña">
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sesion</button>
            <button type="button" class="btn btn-white w-100">Registrarse</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
