@extends('base')

@section('titulo')
    <title>Info de vacante</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/vacantes/infovacante/{{ $vacante->idVacante }}">{{ $vacante->tituloVacante }}</a>
    </p>
@endsection

@section('contenido')

    <div class="col-xl-8 p-2">
        <h1 class="fw-bold text-left my-3">{{ $vacante->tituloVacante }}</h1>
    </div>
    <hr>
    <div class="row p-5">
        <h3>Informacion de la vacante</h3>
    </div>
    <div class="p-5">
        <div class="row text-center">
            <h4>{{ $vacante->catedra->universidad->nombreUniversidad }}</h4>
        </div>
        <div class="row">
            <div class="col-sm-12 p-2">
                <h4>Cátedra</h4>
                <p>{{ $vacante->catedra->nombreCatedra }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 p-2">
                <h4>Descripción breve</h4>
                <p>{{$vacante->descCorta}}</p>
            </div>
            <div class="col-sm-12 p-2">
                <h4 >Descripcion completa</h4>
                <p>{{$vacante->descCompleta}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 p-2">
                <h4>Títlulos Requeridos</h4>
                <p>{{$vacante->titulosRequeridos}}</p>
            </div>
            <div class="col-sm-12 p-2">
                <h4>Horario</h4>
                <p>{{$vacante->horarioJornada}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 p-2">
                <h4>Fecha de límite de postulaciones</h4>
                <p>{{$vacante->fechaLimite}}</p>
            </div>
        </div>
        <div class="row">
            @guest
            <div class="col sm-3" style="text-align:end;">
            <a type="button" class="btn btn-primary " href="/login">
                Iniciar Sesión
            </a>
            </div>
            @endguest

            @auth
            @if(auth()->user()->privilegio==1)
            @php($user=auth()->user())
            <form method="post" action="/vacantes/postularse">
                @csrf
                <div class="form-floating mb-3 " hidden>
                    <label for="idVacante">Id Vacante</label>
                    <input type="number" class="form-control" name="idVacante" id="idVacante"
                    placeholder="Id de la vacante" value="{{ $vacante->idVacante }}">
                </div>
                <div class="form-floating mb-3 " hidden>
                    <label for="id">Id Usuario</label>
                    <input type="number" class="form-control" name="id" id="id"
                    placeholder="Id del usuario" value="{{ $usuario->id }}">
                </div>
                <div style="text-align:end;">
                    <button type="sumbit" class="btn btn-primary">Postularse</button>
                </div>
            </form>
            @elseif(auth()->user()->privilegio==2)
                <a href="/vacantes/postulaciones/{{$vacante->idVacante}}" class="btn btn-primary">Ver postulaciones</a>
            @endif
            @endauth
        </div>
    </div>
 @endsection

 @section('scripts')
 @endsection
