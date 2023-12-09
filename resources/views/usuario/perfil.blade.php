@extends('base')

@section('titulo')
    <title>Listado de postulaciones</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="#">{{ $user->nombre }}</a>
    </p>
@endsection

@section('contenido')
    @if (auth()->user()->privilegio == 1)
        @php($usuario = $user->usuario)
    @endif
    <div class="col p-2">
        <div class="text-center p-2 my-3">
            <h1>{{ $user->nombre }} {{ $user->apellido }}</h1>
            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
        </div>
        <div class="container">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p>Dirección: {{ $user->direccion }}</p> <br>
                        <p>Telefono: {{ $user->telefono }}</p> <br>
                    </div>
                    <div class="col">
                        <p>Tipo de documento: {{ $user->tipodoc }}</p> <br>
                        <p>N° de documento: {{ $user->ndoc }}</p>
                    </div>
                </div>
                @if (auth()->user()->privilegio == 1)
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                            <p>Titulos: {{ $usuario->titulos }}</p> <br>
                            <p>Experiencia: {{ $usuario->experiencia }}</p> <br>
                            <p>Educación: {{ $usuario->educacion }}</p> <br>
                        </div>
                        <div class="col">
                            <p>Publicaciones: {{ $usuario->publicaciones }}</p> <br>
                            <p>Investigaciones: {{ $usuario->investigaciones }}</p> <br>
                            <p>Congresos: {{ $usuario->congresos }}</p> <br>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if (auth()->user()->privilegio == 1)
            <hr>
            @if (count($postulaciones) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-light align-middle"
                        aria-label="Listado de vacantes">
                        <caption>Postulaciones</caption>
                        <thead class="table-light text-center">
                            <th>Informacion de vacante</th>
                            <th>Estado de vacante</th>
                            <th>Puntuación</th>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($postulaciones as $p)
                                @php($vacante = $p->vacante)
                                <tr class="table-light">
                                    <td>
                                        <a class="h3"
                                            href="/vacantes/infovacante/{{ $vacante->idVacante }}">{{ $vacante->tituloVacante }}</a>
                                        <p>Descripción: {{ $vacante->descCorta }}</p>
                                    </td>
                                    <td>
                                        @if ($vacante->fechaLimite < \Carbon\Carbon::now())
                                            <div class="alert alert-danger">Cerrada</div>
                                        @else
                                            <div class="alert alert-success">
                                                <strong>Abierta</strong> La puntuacion actual es parcial
                                            </div>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <h4>{{ $p->puntuacion_total() }}</h4>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            @else
                <h1>No hay postulaciones disponibles</h1>
            @endif
        @endif

    </div>
@endsection

@section('scripts')
@endsection
