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
    @if ($user->privilegio == 1)
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
                            @if (auth()->user()->id == $user->id)
                                <div class="col">
                                    <button type="button" class="btn btn-primary"
                                        style="float:right; right:0 ; bottom:0, position:fixed;"
                                        onclick="editar('{{ $user->id }}','{{ $user->nombre }}','{{ $user->apellido }}','{{ $user->email }}','{{ $user->telefono }}',
                                '{{ $user->tipodoc }}','{{ $user->ndoc }}','{{ $user->direccion }}')"
                                        data-bs-target="#modalU" data-bs-toggle="modal">Editar</button>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>
                @if ($user->privilegio == 1)
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

        @if ($user->privilegio == 1)
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
                <form action="/usuario/actualizar" id="formU" method="POST">
                    @csrf

                    <x-user-inputs :user=$user></x-user-inputs>

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
        const success = document.getElementById("success");
        const c1 = document.getElementById("password");
        const c2 = document.getElementById("password_confirmacion");
        const cb = document.getElementById("cambio");

        function checkpass() {
            success.removeAttribute("hidden");
            if (!cb.checked) {
                success.setAttribute("class", "hidden");
                return true;
            }

            if (c1.value.length < 8 || c1.value.length > 16 || c2.value.length < 8 || c2.value.length > 16) {
                success.setAttribute("class", "alert alert-danger");
                success.innerHTML = "La contraseña debe tener entre 8 y 16 caracteres";
                return false;
            }
            if (c1.value == c2.value) {
                success.setAttribute("class", "alert alert-success");
                success.innerHTML = "Las contraseñas coinciden";
                return true;
            } else {
                success.setAttribute("class", "alert alert-danger");
                success.innerHTML = "Las contraseñas NO coinciden";
                return false;
            }
        }

        var form = document.getElementById("formU");
        form.addEventListener("submit", function(event) {
            if (!checkpass()) {
                //alert("Password mismatch");
                event.preventDefault();
                event.stopPropagation();
            } else if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
            //c2.parentNode.removeChild(c2);
        }, false);

        function editar(id, nombre, apellido, email, telefono, tipodoc, ndoc, direccion) {
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

            document.getElementById('nombre').removeAttribute("readonly", false);
            document.getElementById('apellido').removeAttribute("readonly", false);
            //document.getElementById('email').removeAttribute("readonly", false);
            document.getElementById('telefono').removeAttribute("readonly", false);
            document.getElementById('ndoc').removeAttribute("readonly", false);
            document.getElementById('direccion').removeAttribute("readonly", false);
            document.getElementById('password').removeAttribute("readonly", false);
            document.getElementById('password_confirmacion').removeAttribute("readonly", false);

            document.getElementById('formU').setAttribute('action', '/usuario/actualizar', false);
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
