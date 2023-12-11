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
                        <div class="row">
                            <div class="col">
                                <p>Tipo de documento: {{ $user->tipodoc }}</p> <br>
                                <p>N° de documento: {{ $user->ndoc }}</p>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary"
                                    style="float:right; right:0 ; bottom:0, position:fixed;"
                                    onclick="editar('{{ $user->id }}','{{ $user->nombre }}','{{ $user->apellido }}','{{ $user->email }}','{{ $user->telefono }}',
                                '{{ $user->tipodoc }}','{{ $user->ndoc }}','{{ $user->direccion }}'"
                                    data-bs-target="#modalU" data-bs-toggle="modal">Editar</button>
                            </div>
                        </div>


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


    <div class="modal fade" id="modalU" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Informacion del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar modal"></button>
                </div>
                <form action="/admin/usuarios" id="formU" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12 p-2" hidden>
                                <label for="id">ID</label>
                                <input type="number" class="form-control" name="id" id="id"
                                    placeholder="id del usuario">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" minlength="2"
                                    placeholder="Primer nombre" required>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="apellido" minlength="5"
                                    placeholder="Apellidos" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                    placeholder="Email" required>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="telefono">Teléfono</label>
                                <input type="phone" class="form-control" name="telefono" id="telefono" minlength="7"
                                    placeholder="Teléfono" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    minlength="5" placeholder="direccion" required>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="ndoc">Documento</label>
                                <select name="tipodoc" id="tipodoc" class="form-grup-text">
                                    <option value="DNI">DNI</option>
                                    <option value="ID">ID</option>
                                    <option value="LC">LC</option>
                                    <option value="LE">LE</option>
                                    <option value="CI">CI</option>
                                </select>
                                <input type="number" class="form-control" name="ndoc" id="ndoc" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cambio"
                                        onchange="cambiarContras(this.checked)" />
                                    <label class="form-check-label" for="cambio"> Cambiar contraseña</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row" id='claves' hidden>
                            <div class="col-sm-6 p-2">
                                <label for="password">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" oninput="checkpass()" name="password"
                                        id="password" placeholder="contraseña" minlength="8" maxlength="16">
                                    <button class="btn" style=" border-color: #ced4da;" type="button"
                                        id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 p-2">
                                <label for="password_confirmacion">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" oninput="checkpass()"
                                        name="password_confirmacion" id="password_confirmacion" placeholder="contraseña"
                                        minlength="8" maxlength="16">
                                    <button class="btn" style=" border-color: #ced4da;" type="button"
                                        id="togglePasswordConfirmation">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <h6 class="alert alert-success" id="success" hidden></h6>
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
        function editar(id, nombre, apellido, email, telefono, privilegio, universidad, tipodoc, ndoc, direccion,
            idCatedra = undefined) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('email').value = email;
            document.getElementById('telefono').value = telefono;
            switch (tipodoc) {
                case "DNI": {
                    document.getElementById('tipodoc').selectedIndex = 0;
                    break;
                }
                case "ID": {
                    document.getElementById('tipodoc').selectedIndex = 1;
                    break;
                }
                case "LC": {
                    document.getElementById('tipodoc').selectedIndex = 2;
                    break;
                }
                case "LE": {
                    document.getElementById('tipodoc').selectedIndex = 3;
                    break;
                }
                case "CI": {
                    document.getElementById('tipodoc').selectedIndex = 4;
                    break;
                }
            }
            document.getElementById('ndoc').value = ndoc;
            document.getElementById('direccion').value = direccion;
            document.getElementById('password').value = "";
            document.getElementById('password_confirmacion').value = "";
            showCatedras(universidad, idCatedra);

            document.getElementById('nombre').removeAttribute("readonly", false);
            document.getElementById('apellido').removeAttribute("readonly", false);
            document.getElementById('email').removeAttribute("readonly", false);
            document.getElementById('telefono').removeAttribute("readonly", false);
            document.getElementById('ndoc').removeAttribute("readonly", false);
            document.getElementById('direccion').removeAttribute("readonly", false);
            document.getElementById('password').removeAttribute("readonly", false);
            document.getElementById('password_confirmacion').removeAttribute("readonly", false);

            document.getElementById('formU').setAttribute('action', '/admin/usuarios/actualizar', false);
            document.getElementById('send').setAttribute('class', 'btn btn-success', false);
            document.getElementById('send').innerHTML = "Guardar";
        }

        function togglePasswordVisibility(passwordField, toggleButton) {
            toggleButton.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('password-visible');
            });
        }

        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        togglePasswordVisibility(passwordField, togglePasswordButton);

        const passwordConfirmField = document.getElementById('password_confirmacion');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirmation');
        togglePasswordVisibility(passwordConfirmField, togglePasswordConfirmButton);

        function cambiarContras(b) {
            if (b) {
                document.getElementById('password').removeAttribute("readonly", false);
                document.getElementById('password_confirmacion').removeAttribute("readonly", false);
            } else {
                document.getElementById('password').setAttribute("readonly", "readonly", false);
                document.getElementById('password_confirmacion').setAttribute("readonly", "readonly", false);
            }
            document.getElementById("claves").hidden = !b;
        }
    </script>
@endsection
