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
                <h5>{{ $vacante->catedra->nombreCatedra }}</h5>
                <p>{{ $vacante->catedra->descripcion }}</p>
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
            <div class="alert alert-warning" role="alert" id="alert" hidden>
                <strong>ADEVERTENCIA</strong> No es posible postularse debido a que se ha excedido la fecha de cierre de postulaciones
            </div>
            @guest
            <div class="col sm-3" style="text-align:end;">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#inicio">
                    Iniciar sesion
                  </button>
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
                    <button type="sumbit" class="btn btn-primary" id="btn_pos">Postularse</button>
                </div>
            </form>

            @elseif(auth()->user()->privilegio==2)
            <div style="text-align:end;">
                @if ($vacante->fechaLimite < \Carbon\Carbon::now())
                    <a href="/orden/{{$vacante->idVacante}}" class="btn btn-primary">Ver órden de mérito</a>
                @else
                    <a href="/vacantes/postulaciones/{{$vacante->idVacante}}" class="btn btn-primary">Ver postulaciones</a>
                @endif
            </div>
            @endif
            @endauth

        </div>
    </div>
    @guest
    <!-- Modal -->
    <div class="modal fade" id="inicio" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Inicio de sesion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <p>Por favor inicie sesion y luego haga click en cerrar</p>
                    <iframe src="/login#email" style="width: 100%; height: 100%" id="chframe"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="window.location.reload();">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

<style>
    .modal-dialog,
    .modal-content {
        /* 80% of window height */
        height: 90%;
    }

    .modal-body {
        /* 100% = dialog height, 120px = header + footer */
        max-height: calc(100% - 120px);
        overflow-y: scroll;
    }
</style>

    @endguest
 @endsection

 @section('scripts')
 @if ($vacante->fechaLimite < \Carbon\Carbon::now())
 <script type="text/javascript">
    z=document.getElementById("alert");
    z.removeAttribute("hidden");
    @auth
        p=document.getElementById("btn_pos");
        p.setAttribute("hidden","true");
    @endauth

    @guest
        let reloadOnLogin = function() {
            let currentReq=document.getElementById("chframe").contentWindow.location.href;
             if(!currentReq.includes("/login") && !currentReq.includes("/registrarse")){
                 document.getElementById("chframe").contentWindow.location.href=`/login`;
                }
            fetch(`${window.origin}/auth-status`, {
                method: 'GET',
                credentials: 'include',
                cache: 'no-cache',
                headers: new Headers({'content-type':'application/json'}),
            })
            .then(function (response) {
                if (response.status != 200) {
                    console.log(`response status was not 200, was ${response.status}`);
                    return;
                }
                response.json().then(function (data) {
                    if(data.status=='1'){
                        document.location.reload();
                    }
                });
            });

        }
        document.getElementById("chframe").onload=reloadOnLogin;
    @endguest
 </script>
 @endif

 @endsection
