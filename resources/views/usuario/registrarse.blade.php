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
                <form>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="inputFirstname">Primer nombre</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="Primer nombre">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="inputFirstname">Segundo nombre</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="Segundo nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="inputLastname">Apellidos</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="Apellidos">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="inputCity">Titulo?</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="Provincia">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="inputContactNumber">Teléfono</label>
                            <input type="number" class="form-control" id="inputContactNumber" placeholder="Teléfono">
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="inputWebsite">Sitio Web</label>
                            <input type="text" class="form-control" id="inputWebsite" placeholder="LinkedIn, Instagram...">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="inputCurriculum">Curriculum</label>
                            <input type="file" class="form-control" id="inputCurriculum">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 p-2">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="contraseña">
                        </div>
                        <div class="col-sm-6 p-2">
                            <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="inputPasswordConfirm" placeholder="contraseña">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary px-4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
