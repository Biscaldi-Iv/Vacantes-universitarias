@extends('base')

@section('titulo')
    <title>Puntuar postulación</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/vacantes/infovacante/{{ $vacante->idVacante }}">{{ $vacante->tituloVacante }}</a>
        /<a class="breadcrumb"href="/vacantes/postulaciones/{{$vacante->idVacante}}">Postulaciones</a>
        /<a class="breadcrumb"href="#">Puntuar</a>
    </p>
@endsection

@section('contenido')
<div class="container-fluid">
    @php
        $u=$usuario->user;
    @endphp
    <div class="card-body">
        <div class="row">
            <h3 class="card-title">{{ $u->nombre}} {{$u->apellido}}</h3>
            <div class="col">
                <a href="mailto:{{$u->email}}">{{$u->email}}</a>
                <h5>{{$u->tipodoc}}: {{$u->ndoc}}</h5>
                <h5>Titulo: {{$usuario->titulo}}</h5>
            </div>
        </div>
    </div>

    <form action="/vacantes/puntuar" method="post">
        @csrf
        <div class="row">
            <div class="col-10">
                <h3>Titulo</h3>
                <p>{{$usuario->titulos}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="titulo" id="titulo" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Experiencia</h3>
                <p>{{$usuario->experiencia}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
            <input type="number" min="0" max="10"
                class="form-control" name="experiencia" id="experiencia" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Conocimientos sobre la asignatura</h3>
                <p>{{$usuario->con_asignatura}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="con_asignatura" id="con_asignatura" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Conocimientos profesionales</h3>
                <p>{{$usuario->con_profesionales}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="con_profesionales" id="con_profesionales" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Publicaciones</h3>
                <p>{{$usuario->publicaciones}}</p>
                <hr>
            </div>

            <div class="col-2 form-floating mb-3">
            <input type="number" min="0" max="10"
                class="form-control" name="publicaciones" id="publicaciones" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Congresos</h3>
                <p>{{$usuario->congresos}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="congresos" id="congresos" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Actitud</h3>
                <p></p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
            <input type="number" min="0" max="10"
                class="form-control" name="actitud" id="actitud" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Disponibilidad</h3>
                <p>{{$usuario->disponibilidad}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="disponibilidad" id="disponibilidad" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Entrevista</h3>
                <p></p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="entrevista" id="entrevista" >
            </div>
        </div>
        <div class="row">
            <div class="col-10">
                <h3>Investigaciones</h3>
                <p>{{$usuario->investigaciones}}</p>
                <hr>
            </div>
            <div class="col-2 form-floating mb-3">
                <input type="number" min="0" max="10"
                class="form-control" name="investigaciones" id="investigaciones" >
            </div>
            <input type="number" name="idVacante" id="idVacante"
            value="{{ $vacante->idVacante }}" hidden="true">
            <div class="p-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('scripts')

@endsection
