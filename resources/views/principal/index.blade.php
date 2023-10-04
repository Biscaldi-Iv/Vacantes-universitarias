@extends('base')

@section('titulo')
    <title>Vacantes-AcademyHub</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
    </p>
@endsection

@section('contenido')
    <!-- Search bar -->
    @auth
        @if (auth()->user()->privilegio != 2)
            <x-barra-buscar />
        @endif
    @endauth
    @guest
        <x-barra-buscar />
    @endguest

    <!-- agregar filtro -->

    @auth
        @if (auth()->user()->privilegio == 2)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId"
                onclick="registrar()">
                Agregar Vacante
            </button>
        @endif
    @endauth
    <div class="table-responsive">
        <table
            class="table table-striped
        table-hover
        table-borderless
        table-light
        align-middle"
            aria-label="Listado de vacantes">
            <thead class="table-light">
                <caption hidden>Vacantes</caption>
                <tr>
                    <th hidden>Vacante</th>
                    @auth
                        @if (auth()->user()->privilegio == 2)
                            <th>Vacantes</th>
                            <th></th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        @endif
                    @endauth
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($vacantes as $v)
                    <tr class="table-light">
                        <td>
                            <div class="card-body">
                                <div class="row">
                                    <h3 class="card-title">{{ $v->tituloVacante }}</h3>
                                    <div class="col">
                                        @php
                                            $catedra = $v->catedra;
                                        @endphp
                                        <h4>{{ $catedra->universidad->nombreUniversidad }}</h4>
                                        <h5>{{ $catedra->nombreCatedra }}</h5>
                                        <p id="corta{{ $v->idVacante }}">{{ $v->descCorta }}</p>
                                        <p hidden id="larga{{ $v->idVacante }}">
                                            {{ $v->descCompleta }}
                                        </p>
                                        <p hidden id="titulos{{ $v->idVacante }}">
                                            {{ $v->titulosRequeridos }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </td>
                        <td>
                            @guest
                                <button type="button" class="btn btn-primary" onclick="location.href='/vacantes/infovacante/{{ $v->idVacante }}'">
                                    Postularse <span class="badge badge-light">+Info</span>
                                </button>
                            @endguest
                            @auth
                                @if (auth()->user()->privilegio == 1)
                                    <!--abrir modal-->
                                    <button type="button" class="btn btn-primary"
                                        onclick="location.href='/vacantes/infovacante/{{ $v->idVacante }}'">
                                        Postularse <span class="badge badge-light">+Info</span>
                                    </button>
                                @elseif(auth()->user()->privilegio == 2)
                                    @if ($v->fechaLimite < \Carbon\Carbon::now())
                                        <button type="button" class="btn btn-primary" onclick="location.href='/orden/{{ $v->idVacante }}'">
                                            Ver méritos
                                        </button>
                                    @else
                                        <button type="button" class="btn btn-primary"
                                            onclick="location.href='/vacantes/infovacante/{{ $v->idVacante }}'">
                                            Ver vacante
                                        </button>
                                    @endif
                                @endif
                            @endauth
                        </td>
                        @auth
                            @if (auth()->user()->privilegio == 2)
                                <td>
                                    <button type="button" class="btn btn-primary"
                                        onclick='editar({{ $v->idVacante }}, "{{ $v->tituloVacante }}", {{ $v->fkIdCatedra }}, "{{ $v->horarioJornada }}", "{{ $v->fechaLimite }}")'
                                        data-bs-toggle="modal" data-bs-target="#modalId">Editar</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"
                                        onclick='eliminar({{ $v->idVacante }}, "{{ $v->tituloVacante }}", {{ $v->fkIdCatedra }}, "{{ $v->horarioJornada }}", "{{ $v->fechaLimite }}")'
                                        data-bs-toggle="modal" data-bs-target="#modalId">Eliminar</button>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-center">

        @guest
            {!! $vacantes->links() !!}
        @endguest
        @auth
            @if (auth()->user()->privilegio != 2)
                {!! $vacantes->links() !!}
            @endif
        @endauth
    </div>


    @auth
        @if (auth()->user()->privilegio == 2)
            <!-- Modal -->
            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Registar Vacante en {{ $universidad->nombreUniversidad }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar modal"></button>
                        </div>
                        <form id="formV" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6 p-2">
                                        <label for="tituloVacante">Título vacante</label>
                                        <input type="text" class="form-control" id="tituloVacante" name="tituloVacante"
                                            required placeholder="Ej: Profesor de xx">

                                        <input type="number" class="form-control" name="idVacante" id="idVacante" hidden>
                                    </div>
                                    <div class="col-sm-12 col-md-6 p-2">
                                        <label for="fkIdCatedra">Cátedra</label>
                                        <select class="form-select" name="fkIdCatedra" id="fkIdCatedra">
                                            @foreach ($catedras as $c)
                                                <option value="{{ $c->idCatedra }}">{{ $c->nombreCatedra }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 p-2">
                                        <label for="descCorta">Descripción breve</label>
                                        <textarea class="form-control" name="descCorta" id="descCorta" rowspan="5" required
                                            placeholder="Breve descripción sobre el puesto a cubrir"></textarea>
                                    </div>
                                    <div class="col-sm-12 p-2">
                                        <label for="descCompleta">Descripcion completa</label>
                                        <textarea class="form-control" id="descCompleta" name="descCompleta" required rowspan="10"
                                            placeholder="Descripción ampliada del puesto (sugerencia: incluir responsabilidades)"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6 p-2">
                                        <label for="titulosRequeridos">Títlulos Requeridos</label>
                                        <textarea class="form-control" id="titulosRequeridos" rowspan="3" name="titulosRequeridos"
                                            placeholder="Ej: Ingenieria en xx" required></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6 p-2">
                                        <label for="horarioJornada">Horario</label>
                                        <textarea class="form-control" id="horarioJornada" rowspan="3" name="horarioJornada"
                                            placeholder="Ej: Lunes y miércoles de 7:15 a 9:00" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6 p-2">
                                        <label for="fechaLimite">Fecha de límite de postulaciones</label>
                                        <input type="date" class="form-control" name="fechaLimite" id="fechaLimite">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    aria-label="Cerrar modal">Cerrar</button>
                                <button type="sumbit" class="btn btn-primary" aria-label="Guardar vacante"
                                    id="send">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endauth
@endsection

@section('scripts')
    @auth
        @if (auth()->user()->privilegio == 2)
            <script>
                function fmin() {
                    //limitar las fechas elegibles
                    let fl = document.getElementById("fechaLimite");
                    let today = new Date();
                    let dd = today.getDate();
                    let mm = today.getMonth() + 1; //January is 0!
                    let yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    //agregar 2 dias o mas al minimo
                    if (dd <= 26) {
                        dd += 2;
                    } else {
                        dd = 01;
                        mm++;
                    }
                    today = yyyy + '-' + mm + '-' + dd;
                    fl.setAttribute('min', today);
                    return today;
                }

                function registrar() {
                    //limitar las fechas elegibles
                    let dia = fmin();
                    document.getElementById('idVacante').setAttribute("value", 0, false);
                    document.getElementById('tituloVacante').value = "";
                    //document.getElementById('fkIdUniversidad').value=fkIdUniversidad;
                    document.getElementById('fkIdCatedra').selectedIndex = 0;
                    document.getElementById('horarioJornada').value = "";
                    document.getElementById('descCorta').value = "";
                    document.getElementById('descCompleta').value = "";
                    document.getElementById('titulosRequeridos').value = "";
                    //probable error
                    document.getElementById('fechaLimite').value = dia;

                    //modificar readonly
                    document.getElementById('tituloVacante').removeAttribute("readonly", false);
                    //document.getElementById('fkIdUniversidad').removeAttribute("readonly" , false);
                    document.getElementById('horarioJornada').removeAttribute("readonly", false);
                    document.getElementById('descCorta').removeAttribute("readonly", false);
                    document.getElementById('descCompleta').removeAttribute("readonly", false);
                    document.getElementById('titulosRequeridos').removeAttribute("readonly", false);
                    document.getElementById('fechaLimite').removeAttribute("readonly", false);

                    document.getElementById('formV').setAttribute('action', '/vacantes/registrar', false);
                    document.getElementById('send').setAttribute('class', 'btn btn-success', false);
                    document.getElementById('send').innerHTML = "Guardar";
                }

                function editar(idVacante, tituloVacante, fkIdCatedra, horarioJornada, fechaLimite) {
                    //valores que no se pueden pasar como parametro por ser texto largo
                    let descCorta = document.getElementById('corta' + idVacante).innerHTML;
                    let descCompleta = document.getElementById('larga' + idVacante).innerHTML;
                    let titReq = document.getElementById('titulos' + idVacante).innerHTML;


                    document.getElementById('idVacante').setAttribute("value", idVacante, false);
                    document.getElementById('tituloVacante').value = tituloVacante;
                    //document.getElementById('fkIdUniversidad').value=fkIdUniversidad;
                    for (x = 0; x <= document.getElementById('fkIdCatedra').options.length; x++) {
                        if (document.getElementById('fkIdCatedra').options[x].value == fkIdCatedra) {
                            document.getElementById('fkIdCatedra').selectedIndex = x;
                            break;
                        }
                    }
                    document.getElementById('horarioJornada').value = horarioJornada;
                    document.getElementById('descCorta').value = descCorta;
                    document.getElementById('descCompleta').value = descCompleta;
                    document.getElementById('titulosRequeridos').value = titReq;
                    //probable error
                    document.getElementById('fechaLimite').value = fechaLimite.replace(" 00:00:00", '');

                    //modificar readonly
                    document.getElementById('tituloVacante').removeAttribute("readonly", false);
                    //document.getElementById('fkIdUniversidad').removeAttribute("readonly" , false);
                    document.getElementById('horarioJornada').removeAttribute("readonly", false);
                    document.getElementById('descCorta').removeAttribute("readonly", false);
                    document.getElementById('descCompleta').removeAttribute("readonly", false);
                    document.getElementById('titulosRequeridos').removeAttribute("readonly", false);
                    document.getElementById('fechaLimite').removeAttribute("readonly", false);

                    document.getElementById('formV').setAttribute('action', '/vacantes/editar', false);
                    document.getElementById('send').setAttribute('class', 'btn btn-success', false);
                    document.getElementById('send').innerHTML = "Guardar";
                }

                function eliminar(idVacante, tituloVacante, fkIdCatedra, horarioJornada, fechaLimite) {
                    let fl = document.getElementById("fechaLimite");
                    fl.setAttribute('min', "2000-01-01");
                    //valores que no se pueden pasar como parametro por ser texto largo
                    let descCorta = document.getElementById('corta' + idVacante).innerHTML;
                    let descCompleta = document.getElementById('larga' + idVacante).innerHTML;
                    let titReq = document.getElementById('titulos' + idVacante).innerHTML;

                    document.getElementById('idVacante').setAttribute("value", idVacante, false);
                    document.getElementById('tituloVacante').value = tituloVacante;
                    //document.getElementById('fkIdUniversidad').value=fkIdUniversidad;
                    for (x = 0; x <= document.getElementById('fkIdCatedra').options.length; x++) {
                        if (document.getElementById('fkIdCatedra').options[x].value == fkIdCatedra) {
                            document.getElementById('fkIdCatedra').selectedIndex = x;
                            break;
                        }
                    }
                    document.getElementById('horarioJornada').value = horarioJornada;
                    document.getElementById('descCorta').value = descCorta;
                    document.getElementById('descCompleta').value = descCompleta;
                    document.getElementById('titulosRequeridos').value = titReq;
                    //probable error
                    document.getElementById('fechaLimite').value = fechaLimite.replace(" 00:00:00", '');

                    //modificar readonly
                    document.getElementById('tituloVacante').setAttribute('readonly', 'readonly', false);
                    //document.getElementById('fkIdUniversidad').setAttribute("readonly" , "readonly" , false);
                    document.getElementById('horarioJornada').setAttribute("readonly", "readonly", false);
                    document.getElementById('descCorta').setAttribute("readonly", "readonly", false);
                    document.getElementById('descCompleta').setAttribute("readonly", "readonly", false);
                    document.getElementById('titulosRequeridos').setAttribute("readonly", "readonly", false);
                    document.getElementById('fechaLimite').setAttribute("readonly", "readonly", false);

                    document.getElementById('formV').setAttribute('action', '/vacantes/eliminar', false);
                    document.getElementById('send').setAttribute('class', 'btn btn-danger', false);
                    document.getElementById('send').innerHTML = "Eliminar";
                }
            </script>
        @endif
    @endauth
@endsection
