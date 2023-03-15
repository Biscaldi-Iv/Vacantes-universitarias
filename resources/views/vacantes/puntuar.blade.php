@extends('base')

@section('titulo')
    <title>Puntuar postulación</title>
@endsection

@section('breadcrumb')

<p>
    /<a class="breadcrumb"href="/">Página principal</a>
    /<a class="breadcrumb"href="/vacantes/infovacante/{{ $vacante->idVacante }}">{{ $vacante->tituloVacante }}</a>
    @if(str_contains(url()->previous(), 'orden'))
        /<a class="breadcrumb" href="/orden/{{$vacante->idVacante}}">Ordenes de méritos</a>
        /<a class="breadcrumb"href="#">Orden de Mérito</a>
    @else
        /<a class="breadcrumb"href="/vacantes/postulaciones/{{$vacante->idVacante}}">Postulaciones</a>
        /<a class="breadcrumb"href="#">Puntuar</a>
    @endif
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
                class="form-control" name="titulo" id="titulo" value="{{ $postulacion->titulo ?? old('titulos') ??  0 }}">
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
                class="form-control" name="experiencia" id="experiencia" value="{{ $postulacion->experiencia ?? old('experiencia') ??  0 }}" >
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
                class="form-control" name="con_asignatura" id="con_asignatura" value="{{ $postulacion->con_asignatura ?? old('con_asignatura') ??  0 }}">
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
                class="form-control" name="con_profesionales" id="con_profesionales" value="{{ $postulacion->con_profesionales ?? old('con_profesionales') ??  0 }}">
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
                class="form-control" name="publicaciones" id="publicaciones" value="{{ $postulacion->publicaciones ?? old('publicaciones') ??  0 }}">
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
                class="form-control" name="congresos" id="congresos" value="{{ $postulacion->congresos ?? old('congresos') ??  0 }}">
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
                class="form-control" name="actitud" id="actitud" value="{{ $postulacion->actitud ?? old('actitud') ??  0 }}">
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
                class="form-control" name="disponibilidad" id="disponibilidad" value="{{ $postulacion->disponibilidad ?? old('disponibilidad') ??  0 }}">
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
                class="form-control" name="entrevista" id="entrevista" value="{{ $postulacion->entrevista ?? old('entrevista') ??  0 }}">
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
                class="form-control" name="investigaciones" id="investigaciones" value="{{ $postulacion->investigaciones ?? old('investigaciones') ??  0 }}">
            </div>
            <input type="number" name="idVacante" id="idVacante"
            value="{{ $vacante->idVacante }}" hidden="true">
            <input type="number" name="idUsuario" id="idUsuario"
            value="{{ $usuario->id }}" hidden="true">
            <div style="text-align:end;">
                <button type="submit" id="btn" class="btn btn-primary">Guardar</button>
            </div>

            @if($vacante->fechaLimite < \Carbon\Carbon::now())
            <div class="p-3" style="text-align:end;">
                <a href="{{url()->previous()}}" class="btn btn-primary">
                    <i class="bi bi-arrow-left-circle-fill"></i>

                    Volver
                </a>
            </div>
            @endif
        </div>
    </form>
</div>

@endsection

@section('scripts')
@if ($vacante->fechaLimite < \Carbon\Carbon::now())
<script type="text/javascript">
    document.getElementById("titulo").setAttribute("disabled","true");
    document.getElementById("experiencia").setAttribute("disabled","true");
    document.getElementById("con_asignatura").setAttribute("disabled","true");
    document.getElementById("con_profesionales").setAttribute("disabled","true");
    document.getElementById("publicaciones").setAttribute("disabled","true");
    document.getElementById("congresos").setAttribute("disabled","true");
    document.getElementById("actitud").setAttribute("disabled","true");
    document.getElementById("disponibilidad").setAttribute("disabled","true");
    document.getElementById("entrevista").setAttribute("disabled","true");
    document.getElementById("investigaciones").setAttribute("disabled","true");
    document.getElementById("btn").setAttribute("hidden","true");
</script>
@endif

@endsection
