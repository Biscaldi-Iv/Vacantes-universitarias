@extends('base')

@section('titulo')
    <title>Inicio de sesion</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/login">Inicio de sesion</a>
        /<a class="breadcrumb"href="/reestablecer">Reestablecer contraseña</a>
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
                <input type="email" class="form-control" name="email" id="email" value="{{ request()->email }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" oninput="checkpass()" name="password" id="password"
                    placeholder="contraseña" minlength="8" maxlength="16">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                <input type="password" class="form-control" oninput="checkpass()" name="password_confirmation"
                    id="password_confirmation" placeholder="contraseña" minlength="8" maxlength="16">
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
                //alert("Password mismatch");
                event.preventDefault();
                event.stopPropagation();
            } else if (form.checkValidity() == false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    </script>
@endsection
