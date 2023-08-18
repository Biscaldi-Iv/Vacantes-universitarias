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
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="container mt-4 shadow"
        style="width:30%; padding:40px; margin-top: 30%; margin-bottom: 10%; border-radius:10px;">
        <h5 class="text-center">Ingrese su correo electrónico</h5>
        <p>Se le enivará un mail el cuál incluirá un link para reestablecer su contraseña</p>
        <form action="/contraseña/olvidada" method="POST" style="margin-top:20px; margin-bottom:20px;">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" id="email" value=""
                    placeholder="Correo electronico" required>

            </div>
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection
