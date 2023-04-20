@extends('base')

@section('titulo')
    <title>Inicio de sesion</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/login">Inicio de sesion</a>
        /<a class="breadcrumb"href="/reestablecer">Reestablecer contraseña</a>
    </p>
@endsection

@section('contenido')
    <div class="container mt-4 shadow"
        style="width:30%; padding:40px; margin-top: 30%; margin-bottom: 10%; border-radius:10px;">
        <h5 class="text-center">Ingrese su nueva contraseña</h5>
        <form action="/contraseña/reestablecer" method="POST" style="margin-top:20px; margin-bottom:20px;">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ request()->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Confirme contraseña</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                    placeholder="Contraseña">
            </div>
            <input type="text" class="form-control" name="token" id="token" value="{{ request()->token }}" hidden>
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
