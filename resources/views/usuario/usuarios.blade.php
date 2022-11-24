@extends('base')

@section('titulo')
    <title>Usuarios</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/admin/usuarios">Usuarios</a>
    </p>
@endsection

@section('contenido')
<div class="row-4 my-3">
    <a class="btn btn-primary btn-lg" href="/admin/registrar">
        Registrar usuario
    </a>
</div>

<div class="table-responsive">
    <table class="table table-striped
    table-hover
    table-borderless
    table-light
    align-middle">
        <thead class="table-light">
            <caption>Listado de usuarios</caption>
            <tr>
                <th>Documento</th>
                <th>Nombre y apellido</th>
                <th>Contacto</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($usuarios as $u)
                <tr class="table-light">
                    <td>
                        <p>{{ $u->tipodoc }} {{ $u->ndoc }}</p>
                    </td>
                    <td>
                        <p>{{ $u->nombre }} {{ $u->apellido }} </p>
                    </td>
                    <td>
                        <p>
                            <a href="mailto:{{ $u->email }}">{{ $u->email }}</a> <br>
                        {{ $u->telefono }}
                        </p>
                    </td>
                    <td>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </div>
                    </td>
                    <td>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
    </table>
</div>

@endsection

@section('scripts')
@endsection
