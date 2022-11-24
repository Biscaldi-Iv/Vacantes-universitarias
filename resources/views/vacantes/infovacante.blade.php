@extends('base')

@section('titulo')
    <title>Info de vacante</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/vacantes">Vacantes</a>
        /<a class="breadcrumb"href="/vacantes/infovacante">"Nombre de vacante"</a>
    </p>
@endsection

@section('contenido')
    <div class="col-xl-8 p-2">
        <h2 class="fw-bold text-left my-3">Vacante XXX</h2>
    </div>
    Info vacante
 @endsection

 @section('scripts')
 @endsection
