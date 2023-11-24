@extends('base')

@section('titulo')
    <title>Contacto</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/contact">contacto</a>
    </p>
@endsection

@section('contenido')
<div class="p-5">
    <div class="row">
        <div class="col-md-8">
            <h1>Contacto</h1>
  
            <!-- Formulario de contacto -->
            <form action="/info/contact" method="post" class="w-100">
            @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
  
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
  
                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
                </div>
  
                <button type="submit" class="btn btn-primary my-2">Enviar</button>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contacto</h5>
                    <p class="card-text">Para cualquier consulta extra, no dudes en ponerte en contacto con nosotros:</p>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Biscaldi Iván:</strong> <a href="mailto:correo2@example.com">ivanbisc12@gmail.com</a></li>
                      <li class="list-group-item"><strong>Chiaro Valentina:</strong> <a href="mailto:correo1@example.com">vchiaro@frro.utn.edu.ar</a></li>
                        <li class="list-group-item"><strong>Folguera Angel:</strong> <a href="mailto:correo2@example.com">angelfol@outlook.com</a></li>
                    </ul>
                    <a href="https://github.com/Biscaldi-Iv/Vacantes-universitarias" class="btn btn-primary mt-3" target="_blank">Repositorio en GitHub</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
