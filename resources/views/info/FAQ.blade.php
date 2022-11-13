@extends('base')

@section('titulo')
    <title>Preguntas frecuentes</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/faq">Preguntas frecuentes</a>
    </p>
@endsection

@section('contenido')
    <div class="container w-75 bg-white shadow mt-5 mb-5">
        <div class="col-xl-8 p-2">
            <h2 class="fw-bold text-left my-3">Preguntas Frequentes</h2>
        </div>
        <div class="row p-2">
            <div class="col-md-10 mx-auto">
                Lista de preguntas
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
