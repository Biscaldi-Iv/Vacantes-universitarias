@extends('base')

@section('titulo')
    <title>Universidades</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/universidades">Universidades</a>
    </p>
@endsection

@section('contenido')

@if (auth()->user()->privilegio==3)
<div class="row-4 my-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
    data-bs-target="#modalU" onClick="crear()">
    Registrar universidad
    </button>
</div>
@endif

<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-light align-middle"
    aria-label="Listado de universidades que utilizan el sitio para abrir llamados a cubrir vacantes">
        <thead class="table-light">
            <caption>Listado de universidades</caption>
            <tr>
                <th>Universidad</th>
                <th>Contacto</th>

                @if (auth()->user()->privilegio==3)
                <th><!--editar--></th>
                <th><!--eliminar--></th>
                @endif

            </tr>
            </thead>
            <tbody class="table-group-divider">

            @foreach ($universidades as $u)

                <tr class="table-light" >
                    <td>
                        <h3>{{ $u->nombreUniversidad }}</h3>
                        <p>Dirección: {{ $u->direccionUniversidad }}</p><br>
                        <a href="{{ $u->sitioWeb }}">{{ $u->sitioWeb }}</a>
                    </td>
                    <td>
                        <p>
                            Telefono: {{ $u->telefono }} <br>
                            Email: <a href="mailto:{{ $u->emailRRHH }}">{{ $u->emailRRHH }}</a>
                        </p>
                    </td>

                    @if (auth()->user()->privilegio==3)

                    <td>
                        <button type="button" class="btn btn-primary" aria-pressed="false" autocomplete="off"
                        data-bs-toggle="modal" data-bs-target="#modalU"
                        onClick="editar({{$u->idUniversidad}},'{{$u->nombreUniversidad}}',
                        '{{$u->direccionUniversidad}}','{{$u->sitioWeb}}','{{$u->emailRRHH}}', {{ $u->telefono }})" >
                            Editar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" aria-pressed="false" autocomplete="off"
                        data-bs-toggle="modal" data-bs-target="#modalU"
                        onClick="eliminar({{$u->idUniversidad}},'{{$u->nombreUniversidad}}',
                        '{{$u->direccionUniversidad}}','{{$u->sitioWeb}}','{{$u->emailRRHH}}', {{ $u->telefono }})">
                            Eliminar
                        </button>
                    </td>

                    @endif
                </tr>

            @endforeach

            </tbody>
            <tfoot>

            </tfoot>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalU" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Informacion de la universidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/universidades" id="formU" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-floating mb-3">
                        <input type="number" readonly
                        class="form-control" name="idUniversidad" id="idUniversidad" placeholder="Id de la universidad">
                        <label for="idUniversidad">Id</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nombreUniversidad" id="nombreUniversidad"
                        placeholder="Nombre de la universidad" required>
                        <label for="nombreUniversidad">Nombre de la universidad</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input
                            type="text" class="form-control" name="direccionUniversidad" id="direccionUniversidad"
                            placeholder="Direccion de la universidad" required>
                        <label for="direccionUniversidad">Direccion</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="emailRRHH" id="emailRRHH"
                            placeholder="Email de RRHH de la universidad" required>
                        <label for="emailRRHH">Email de RRHH</label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="url" class="form-control" name="sitioWeb" id="sitioWeb"
                            placeholder="Sitio web de la universidad" required>
                        <label for="sitioWeb">Sitio Web</label>
                        </div>
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" name="telefono" id="telefono"
                          placeholder="Telefono de la universidad" required>
                          <label for="telefono">Telefono</label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="sumbit" id="send" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@if (auth()->user()->privilegio==3)
<script>
    function crear(){
        document.getElementById('idUniversidad').value=0;
        document.getElementById('nombreUniversidad').value="";
        document.getElementById('direccionUniversidad').value="";
        document.getElementById('sitioWeb').value="";
        document.getElementById('emailRRHH').value="";
        document.getElementById('telefono').value="";

        document.getElementById('nombreUniversidad').removeAttribute("readonly" , false);
        document.getElementById('direccionUniversidad').removeAttribute("readonly" , false);
        document.getElementById('sitioWeb').removeAttribute("readonly" , false);
        document.getElementById('emailRRHH').removeAttribute("readonly" , false);
        document.getElementById('telefono').removeAttribute("readonly", false);

        document.getElementById('formU').setAttribute('action','/universidades/crear', false);
        document.getElementById('send').setAttribute('class','btn btn-success', false);
        document.getElementById('send').innerHTML="Registrar";
    }

    function editar(idUniversidad,nombreUniversidad,direccionUniversidad,sitioWeb,emailRRHH, telefono){
        document.getElementById('idUniversidad').value=idUniversidad;
        document.getElementById('nombreUniversidad').value=nombreUniversidad;
        document.getElementById('direccionUniversidad').value=direccionUniversidad;
        document.getElementById('sitioWeb').value=sitioWeb;
        document.getElementById('emailRRHH').value=emailRRHH;
        document.getElementById('telefono').value=telefono;

        document.getElementById('nombreUniversidad').removeAttribute("readonly" , false);
        document.getElementById('direccionUniversidad').removeAttribute("readonly" , false);
        document.getElementById('sitioWeb').removeAttribute("readonly" , false);
        document.getElementById('emailRRHH').removeAttribute("readonly" , false);
        document.getElementById('telefono').removeAttribute("readonly", false);

        document.getElementById('formU').setAttribute('action','/universidades/actualizar', false);
        document.getElementById('send').setAttribute('class','btn btn-success', false);
        document.getElementById('send').innerHTML="Guardar";
    }
    function eliminar(idUniversidad,nombreUniversidad,direccionUniversidad,sitioWeb,emailRRHH, telefono){
        document.getElementById('idUniversidad').value=idUniversidad;
        document.getElementById('nombreUniversidad').value=nombreUniversidad;
        document.getElementById('direccionUniversidad').value=direccionUniversidad;
        document.getElementById('sitioWeb').value=sitioWeb;
        document.getElementById('emailRRHH').value=emailRRHH;
        document.getElementById('telefono').value=telefono;

        document.getElementById('nombreUniversidad').setAttribute("readonly" , "readonly" , false);
        document.getElementById('direccionUniversidad').setAttribute("readonly" , "readonly" , false);
        document.getElementById('sitioWeb').setAttribute("readonly" , "readonly" , false);
        document.getElementById('emailRRHH').setAttribute("readonly" , "readonly" , false);
        document.getElementById('telefono').setAttribute("readonly" , "readonly" , false);

        document.getElementById('formU').setAttribute('action','/universidades/borrar', false);
        document.getElementById('send').setAttribute('class','btn btn-danger', false);
        document.getElementById('send').innerHTML="Eliminar";
    }
</script>
@endif
@endsection
