@extends('base')

@section('titulo')
    <title>Inicio de sesion</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/login">Inicio de sesion</a>
        /<a class="breadcrumb" href="/reestablecer">Reestablecer contraseña</a>
    </p>
@endsection

@section('contenido')
    <div class="container mt-4 shadow"
        style="width:30%; padding:40px; margin-top: 30%; margin-bottom: 10%; border-radius:10px;">
        <h5 class="text-center">Ingrese su nueva contraseña</h5>
        <form action="/contraseña/reestablecer" method="POST" style="margin-top:20px; margin-bottom:20px;"
            id="form-validation">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ request()->email }}"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" oninput="checkpass()" name="password" id="password" placeholder="Contraseña" minlength="8" maxlength="16">
                    <button class="btn" style=" border-color: #ced4da;" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <div class="input-group">
                    <input type="password" class="form-control" oninput="checkpass()" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" minlength="8" maxlength="16">
                    <button class="btn" style=" border-color: #ced4da;" type="button" id="togglePasswordConfirmation">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>
            <h6 class="alert alert-success" id="success" hidden></h6>
            <input type="text" class="form-control" name="token" id="token" value="{{ request()->token }}" hidden>
            <button type="submit" class="btn btn-primary w-100" id="submit">Enviar</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const success = document.getElementById("success");
        const c1 = document.getElementById("password");
        const c2 = document.getElementById("password_confirmation");

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
                event.preventDefault();
                event.stopPropagation();
            } else if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);

       
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

        const passwordConfirmField = document.getElementById('password_confirmation');
        const togglePasswordConfirmButton = document.getElementById('togglePasswordConfirmation');
        togglePasswordVisibility(passwordConfirmField, togglePasswordConfirmButton);
    

    </script>
@endsection
