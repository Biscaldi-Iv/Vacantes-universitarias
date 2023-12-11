@extends('base')

@section('titulo')
    <title>Registrarse</title>
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        @guest
            /<a class="breadcrumb" href="/registrarse">Registrarse</a>
        @endguest
        @auth
            /<a class="breadcrumb" href="/admin/usuarios">Usuarios</a>
            /<a class="breadcrumb" href="/admin/usuarios/registrar">Registrar usuarios</a>
        @endauth

    </p>
@endsection

@section('contenido')
    <div class="container w-75 bg-white shadow mt-5 mb-5 ">
        <div class="col-xl-8 p-2">
            @guest
            <h2 class="fw-bold text-left my-3 ">Registrarse</h2>
        @endguest
        @auth
        <h2 class="fw-bold text-left my-3 ">Registrar Usuario</h2>
        @endauth
        </div>
        <div class="row p-2 ">
            <div class="col-md-10 mx-auto ">
                @auth
                    @if (auth()->user()->privilegio == 3)
                        <form method="POST" action="/admin/usuarios/registrar" id="form-validation">
                    @endif
                @endauth
                @guest
                    <form method="POST" action="/registrarse" id="form-validation">
                @endguest
                    @csrf

                    @auth
                    <x-user-inputs :universidades=$universidades></x-user-inputs>
                    @endauth

                    @guest
                        <x-user-inputs></x-user-inputs>
                        <input type="number" name="privilegio" value="1" hidden>
                        <div class="form-group row">
                            <div class="col-sm-6 p-2">
                                <div class="g-recaptcha" data-sitekey={{ env('CAPTCHA_SITE_KEY') }}></div>
                            </div>
                        </div>
                    @endguest

                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="sumbit" class="btn btn-primary px-4">Guardar</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("form-login").submit();
        }
        //const danger=document.getElementById("danger");
        const success = document.getElementById("success");
        const c1 = document.getElementById("password");
        const c2 = document.getElementById("password_confirmacion");

        function checkpass() {
            success.removeAttribute("hidden");
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

        var form = document.getElementById("form-validation");
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

        @auth
        @if (auth()->user()->privilegio == 3)
            function cambiar(sel) {
                if (sel.value == 2) {
                    document.getElementById("selUni").hidden = false;
                } else {
                    document.getElementById("selUni").hidden = true;
                }
            }
        @endif
        @endauth
        function togglePasswordVisibility(passwordField, toggleButton) {
            toggleButton.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('password-visible');
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        }

        const passwordField = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');
        togglePasswordVisibility(passwordField, togglePasswordButton);

        const passwordConfirmField = document.getElementById('password_confirmacion');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirmation');
        togglePasswordVisibility(passwordConfirmField, togglePasswordConfirmButton);

    </script>
@endsection
