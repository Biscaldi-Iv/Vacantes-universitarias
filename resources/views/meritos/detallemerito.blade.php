@extends('base')

@section('titulo')
<title>Detalles del merito</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/ordenmerito">Orden de merito</a>
        /<a class="breadcrumb"href="/ordenmerito/detallemerito">Detalles del merito</a>
    </p>
@endsection


@section('contenido')
    <div class="col-xl-8 p-2">
        <h2 class="fw-bold text-left my-3">Detalle de mérito de "Postulante"</h2>
    </div>
    <div class="row p-2">
        <div class="col-md-10 mx-auto">
            Lista de puntajes
        </div>
    </div>
@endsection

@section('scripts')
@endsection

