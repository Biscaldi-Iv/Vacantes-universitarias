@extends('base')

@section('titulo')
    <title>Orden de merito</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/ordenmerito">Orden de merito</a>
    </p>
@endsection

@section('contenido')
    <div class="col p-2">
        <h2 class="fw-bold text-left my-3 ">Órden de mérito</h2>
        <div class="row p-2">
            <div class="col ">
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="card-title">Postulante</h6>
                            <div class="col">
                                <p>Puntaje total</p>
                            </div>
                            <div class="col-md-auto p-2">
                                <a href="/maquetas/detallemerito.html">
                                    <button type="button" class="btn btn-outline-primary">Detalles</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
