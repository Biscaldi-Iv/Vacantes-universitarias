@extends('base')

@section('titulo')
    <title>Registrarse</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/registrarse">Registrarse</a>
    </p>
@endsection

@section('contenido')
    <div class="container w-75 bg-white shadow mt-5 mb-5 ">
        <div class="col-xl-8 p-2">
            <h2 class="fw-bold text-left my-3 ">Registrarse</h2>
        </div>
        <div class="row p-2 ">
            <div class="col-md-10 mx-auto ">
                <form method="POST" action="/registrarse" id="form-validation">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                            minlength="2" placeholder="Primer nombre" value="{{ old('nombre') }}" required>
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido"
                            minlength="5" placeholder="Apellidos" value="{{ old('apellido') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                            placeholder="Email">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control" name="telefono"
                            minlength="7" placeholder="Teléfono" value="{{ old('telefono') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion"
                            minlength="5" placeholder="direccion" value="{{ old('direccion') }}" required>
                        </div>
                        <div class="col-sm-6 p-2" hidden>
                            <label for="privilegio">Privilegio</label>
                            <input type="number" class="form-control" name="privilegio" value="1">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="ndoc">Documento</label>
                            <select name="tipodoc" class="form-grup-text">
                                <option value="DNI">DNI</option>
                                <option value="ID">ID</option>
                                <option value="LC">LC</option>
                                <option value="LE">LE</option>
                                <option value="CI">CI</option>
                            </select>
                            <input type="number" class="form-control" name="ndoc" value="{{ old('ndoc') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" oninput="checkpass()" name="password"
                            value="{{ old('password') }}" id="password" placeholder="contraseña"
                            minlength="8" maxlength="16">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="password_confirmacion">Confirmar Contraseña</label>
                            <input type="password" class="form-control" oninput="checkpass()"
                            name="password_confirmacion" id="password_confirmacion" placeholder="contraseña"
                            value="{{ old('password_confirmacion') }}" minlength="8" maxlength="16">
                        </div>
                    </div>
                    <h6 class="alert alert-success" id="success" hidden></h6>

                    <button type="sumbit" class="btn btn-primary px-4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
//const danger=document.getElementById("danger");
const success=document.getElementById("success");
const c1=document.getElementById("password");
const c2=document.getElementById("password_confirmacion");

function checkpass(){
    success.removeAttribute("hidden");
    if(c1.value==c2.value){
        success.setAttribute("class", "alert alert-success");
        success.innerHTML = "Las contraseñas coinciden";
        return true;
    }
    else{
        success.setAttribute("class", "alert alert-danger");
        success.innerHTML = "Las contraseñas NO coinciden";
        return false;
    }
}

var form = document.getElementById("form-validation");
 form.addEventListener("submit", function(event) {
      if ( !checkpass() ) {
          //alert("Password mismatch");
          event.preventDefault();
          event.stopPropagation();
      }
      else if (form.checkValidity() == false) {
          event.preventDefault();
          event.stopPropagation();
      }
      form.classList.add("was-validated");
      //c2.parentNode.removeChild(c2);
    }, false);


</script>
@endsection
