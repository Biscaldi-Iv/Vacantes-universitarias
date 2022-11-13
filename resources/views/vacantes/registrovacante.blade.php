@extends('base')

@section('titulo')
    <title>Registrar vacante</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/vacantes">Vacantes</a>
        /<a class="breadcrumb"href="/vacantes/registrovacante">Registrar vacante</a>
    </p>
@endsection

@section('contenido')
    <div class="col-xl-8 p-2">
        <h2 class="fw-bold text-left my-3 ">Registrar vacante</h2>
    </div>
    <div class="row p-2 ">
        <div class="col-md-10 mx-auto ">
            <form>
                <!-- Falta cambiar los id -->
                <div class="form-group row">
                    <div class="col-sm-6 p-2">
                        <label for="inputFirstname">Título vacante</label>
                        <input type="text" class="form-control" id="inputFirstname"
                        placeholder="Análisis matemático I">
                    </div>
                    <div class="col-sm-6 p-2">
                        <!-- Podría ser un droplist -->
                        <label for="inputFirstname">Universidad</label>
                        <input type="text" class="form-control" id="inputFirstname"
                        placeholder="Universidad Tecnológica nacional">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 p-2">
                        <label for="inputLastname">Título</label>
                        <input type="text" class="form-control" id="inputLastname"
                        placeholder="Profesor de matemática universitaria">
                    </div>
                    <div class="col-sm-6 p-2">
                        <label for="inputCity">Horario</label>
                        <input type="text" class="form-control" id="inputCity"
                        placeholder="Lunes y miércoles de 7:15 a 9:00">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 p-2">
                        <label for="email">Periodo</label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="3 meses">
                    </div>
                    <div class="col-sm-6 p-2">
                        <label for="inputContactNumber">Otros</label>
                        <input type="number" class="form-control" id="inputContactNumber" placeholder="Más info">
                    </div>
                </div>
                <button type="button" class="btn btn-primary px-4">Guardar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
