@extends('base')

@section('titulo')
    <title>Catedras</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/catedrasU">Catedras</a>
    </p>
@endsection

@section('contenido')

<div class="row-4 my-3">
    <h1 class="h1 p-2">Listado de Cátedras</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
    data-bs-target="#modalC" onClick="crear()">
    Registrar catedra
    </button>
</div>


<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless table-light align-middle"
    aria-label="Listado de catedras de una Universidad">
        <thead class="table-light">
            <caption>Listado de catedras</caption>
            <tr>
                <th>Catedra</th>
                <th>Descripcion</th>
                <th><!--editar--></th>
                <th><!--eliminar--></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">

            @foreach ($catedras as $c)

                <tr class="table-light" >
                    <td>
                        <h4>{{ $c->nombreCatedra }}</h4>
                    </td>
                    <td>
                        <p>{{ $c->descripcion }}</p>
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary" aria-pressed="false" autocomplete="off"
                        data-bs-toggle="modal" data-bs-target="#modalC"
                        onClick="editar({{$c->idCatedra}},'{{$c->nombreCatedra}}',
                        '{{$c->descripcion}}')" >
                            Editar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" aria-pressed="false" autocomplete="off"
                        data-bs-toggle="modal" data-bs-target="#modalC"
                        onClick="eliminar({{$c->idCatedra}},
                        '{{$c->nombreCatedra}}','{{$c->descripcion}}')">
                            Eliminar
                        </button>
                    </td>

                </tr>

            @endforeach

            </tbody>
            <tfoot>

            </tfoot>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $catedras->links() !!}
</div>

<!-- Modal -->
<div class="modal face" id="modalC" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Informacion de la cátedra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar modal"></button>
            </div>
            <form id="formC" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="idCatedra">Id</label>
                            <input type="number" readonly class="form-control" name="idCatedra"
                            id="idCatedra" placeholder="Id de la cátedra">
                        </div>
                        @if(auth()->user()->privilegio==2)
                        <div class="mb-3" hidden>
                            <input type="number" readonly class="form-control" name="fkIdUniversidad"
                            id="fkIdUniversidad" placeholder="Id de la universidad a la que pertenece la cátedra"
                            value="{{ $universidad->idUniversidad }}">
                        </div>
                        @else
                        <div>
                            <select class="form-select form-select-lg" name="fkIdUni" id="fkIdUni">
                                @foreach ($universidad as $u)
                                    <option value="{{ $u->idUniversidad }}">{{ $u->nombreUniversidad }}</option>
                                @endforeach
                            </select>
                        </div>
                            @endif
                        <div class="mb-3">
                          <label for="nombreCatedra" class="form-label">Nombre de catedra</label>
                          <input type="text" class="form-control" name="nombreCatedra" id="nombreCatedra"
                          aria-describedby="helpId" placeholder="Nombre de la catedra" required>
                        </div>
                        <div class="mb-3">
                          <label for="descripcion" class="form-label">Descripcion de la catedra</label>
                          <textarea class="form-control" name="descripcion" id="descripcion" rows="5">
                          </textarea>
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
<script>
function crear(){
    document.getElementById('idCatedra').value=0;
    document.getElementById('nombreCatedra').value="";
    document.getElementById('descripcion').value="";

    document.getElementById('nombreCatedra').removeAttribute("readonly" , false);
    document.getElementById('descripcion').removeAttribute("readonly" , false);

    document.getElementById('formC').setAttribute('action','/universidades/catedrasU/crear', false);
    document.getElementById('send').setAttribute('class','btn btn-success', false);
    document.getElementById('send').innerHTML="Registrar";
}

function editar(idCatedra,nombreCatedr,descripcion){
    document.getElementById('idCatedra').value=idCatedra;
    document.getElementById('nombreCatedra').value=nombreCatedr;
    document.getElementById('descripcion').value=descripcion;

    document.getElementById('nombreCatedra').removeAttribute("readonly" , false);
    document.getElementById('descripcion').removeAttribute("readonly" , false);


    document.getElementById('formC').setAttribute('action','/universidades/catedrasU/actualizar', false);
    document.getElementById('send').setAttribute('class','btn btn-success', false);
    document.getElementById('send').innerHTML="Guardar";
}
function eliminar(idCatedra,nombreCatedr,descripcion){
    document.getElementById('idCatedra').value=idCatedra;
    document.getElementById('nombreCatedra').value=nombreCatedr;
    document.getElementById('descripcion').value=descripcion;

    document.getElementById('nombreCatedra').setAttribute("readonly" , "readonly" , false);
    document.getElementById('descripcion').setAttribute("readonly" , "readonly" , false);

    document.getElementById('formC').setAttribute('action','/universidades/catedrasU/borrar', false);
    document.getElementById('send').setAttribute('class','btn btn-danger', false);
    document.getElementById('send').innerHTML="Eliminar";
}
</script>
@endsection
