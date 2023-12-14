@extends('base')

@section('titulo')
    <title>Registrar vacante</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/vacantes">Vacantes</a>
        /<a class="breadcrumb" href="/vacantes/registrovacante">Registrar vacante</a>
    </p>
@endsection

@section('contenido')
    <div class="col-xl-8 p-2">
        <h2 class="fw-bold text-left my-3 ">Registrar vacante</h2>
    </div>
    <div class="row p-2 ">
        <div class="col-md-10 mx-auto ">
            <form action="/vacantes/crear" method="POST">
                @csrf
                <!-- Falta cambiar los id -->
                <div class="form-group row">
                    <div class="col-sm-6 p-2">
                        <label for="tituloVacante">Título vacante</label>
                        <input type="text" class="form-control" id="tituloVacante" name="tituloVacante" required
                            placeholder="Ej: Profesor de xx">

                        <input type="number" class="form-control" name="fkIdUniversidad" id="fkIdUniversidad"
                            value="{{ $idUniversidad }}" hidden>
                    </div>
                    <div class="col-sm-6 p-2">
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
                        <label for="descCorta">Breve destripción</label>
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
                    <div class="col-sm-6 p-2">
                        <label for="titulosRequeridos">Títlulos Requerido</label>
                        <textarea class="form-control" id="titulosRequeridos" rowspan="3" name="titulosRequeridos"
                            placeholder="Ej: Ingenieria en xx" required></textarea>
                    </div>
                    <div class="col-sm-6 p-2">
                        <label for="horarioJornada">Horario</label>
                        <textarea class="form-control" id="horarioJornada" rowspan="3" name="horarioJornada"
                            placeholder="Ej: Lunes y miércoles de 7:15 a 9:00" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 p-2">
                        <label for="fechaLimite">Fecha de límite de postulaciones</label>
                        <input type="datetime-local" class="form-control" name="fechaLimite" id="fechaLimite">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-4">Guardar</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.all.tags("textarea").forEach(element => {
            element.value = element.value.trim();
        });
    </script>
@endsection
