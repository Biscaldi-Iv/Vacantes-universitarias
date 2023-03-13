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
        <div class="input-group">
            <form>
                @csrf
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button>
            </form>
        </div>
    </div>
    <div class="text-center p-2 my-3">
        <h1 class="fw-bold text-left my-3" >{{$vacante->tituloVacante}}</h1>
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped
        table-hover
        table-borderless
        table-light
        align-middle" aria-label="Listado de vacantes">
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
                    <tr class="table-light" >
                        <td>
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">{{ $u->nombre}} {{$u->apellido}}</h3>
                                    <div class="col">
                                        <a href="mailto:{{$u->email}}">{{$u->email}}</a>
                                        <h5>{{$u->tipodoc}}: {{$u->ndoc}}</h5>
                                        <h5>Puntuación: {{$p->puntuacion_total()}}</h5>
                                    </div>
                                    <div class="col-md-auto p-2">
                                        <form action="/vacantes/infoUsuario" method="post">
                                            @csrf
                                            <input type="number" name="idVacante" id="idVacante" value="{{ $p->fkIdVacante }}" hidden>
                                            <input type="number" name="idUsuario" id="idUsuario" value="{{ $usuario->id }}" hidden>
                                            <button type="sumbit" class="btn btn-primary">Ver detalle postulacion</button>
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
