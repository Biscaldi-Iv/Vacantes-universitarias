@extends('base')

@section('titulo')
    <title>Listado de postulaciones</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/vacantes/infovacante/{{ $vacante->idVacante }}">{{ $vacante->tituloVacante }}</a>
        /<a class="breadcrumb" href="/vacantes/postulaciones/{{$vacante->idVacante}}">Postulaciones</a>
    </p>
@endsection

@section('contenido')
    <div class="col p-2">
        <x-barra-buscar />
    </div>
    <div class="text-center p-2 my-3">
        <h1>Vacante: {{$vacante->tituloVacante}}</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless table-light align-middle" aria-label="Listado de vacantes">
        <caption>Postulaciones</caption>
        <thead class="table-light">
            <th>Postulante</th>
            <th hidden>Puntuar</th>
        </thead>
            <tbody class="table-group-divider">
                @if(count($postulaciones)>0)
                    @foreach ($postulaciones as $p)
                    <!-- Hay que acceder al usuario para acceder al user para acceder al nombre y apellido para acceder al infinito y más allá
                    -->
                    @php($usuario=$p->usuario)
                    @php($u=$usuario->user)
                    <tr class="table-light">
                        <td>
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">{{ $u->nombre}} {{$u->apellido}}</h3>
                                    <div class="col-md-7">
                                        <a href="mailto:{{$u->email}}">{{$u->email}}</a>
                                        <h5>{{$u->tipodoc}}: {{$u->ndoc}}</h5>
                                    </div>
                                    @if($p->puntuacion_total()==0)
                                    <div class="col-md-2">
                                        <div class="alert alert-warning text-center" role="alert">
                                            <i class="bi bi-exclamation-triangle-fill"></i>
                                            Sin puntuar
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-md-2 "></div>
                                    @endif
                                    <div class="col">
                                        @if($u->privilegio == 1)
                                        <button type="button" class="btn btn-outline-primary" onclick="location.href='/usuario/perfil/{{$u->id}}'">
                                            Ver perfil
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-md-auto">
                                        <form action="/vacantes/infoUsuario" method="post">
                                            @csrf
                                            <input type="number" name="idVacante" id="idVacante" value="{{ $vacante->idVacante }}" hidden>
                                            <input type="number" name="idUsuario" id="idUsuario" value="{{ $usuario->id }}" hidden>
                                            <button type="sumbit" class="btn btn-primary">Ver postulación</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <p>No hay postulaciones disponibles</p>
            @endif
        </tbody>
        <tfoot>

        </tfoot>
        </table>
    </div>
@endsection

@section('scripts')

@endsection
