@extends('base')

@section('titulo')
    <title>Perfil profesional</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
        /<a class="breadcrumb"href="/datospostulante">Perfil profesional</a>
    </p>
@endsection

@section('contenido')
    <div class="container w-75 bg-white shadow mt-5 mb-5 ">
        <div class="col-xl-8 p-2">
            <h2 class="fw-bold text-left my-3 ">Perfil profesional</h2>
        </div>
        <div class="row p-2 ">
            <div class="col-md-10 mx-auto ">
                <form method="POST" action="/datospostulante" id="form-validation">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-12 p-2">
                            <label for="titulos">Titulos</label>
                            <textarea name="titulos" class="form-control" rows="5"
                                >{{ session('postulante')->titulos ?? old('titulos') ??  '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="experiencia">Experiencia</label>
                            <textarea name="experiencia" class="form-control" rows="5"
                                >{{ session('postulante')->experiencia ?? old('experiencia') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="con_asignatura">Conocimiento</label>
                            <textarea class="form-control" name="con_asignatura" placeholder="" rows="5">
                                {{ session('postulante')->con_asignatura ?? old('con_asignatura') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="educacion">Educacion</label>
                            <textarea class="form-control" name="educacion" rows="5"
                                >{{ session('postulante')->educacion ?? old('educacion') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="publicaciones">Publicaciones</label>
                            <textarea class="form-control" name="publicaciones" placeholder="" rows="5"
                                >{{ session('postulante')->publicaciones ?? old('publicaciones') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="investigaciones">Investigaciones</label>
                            <textarea class="form-control" name="investigaciones" rows="5"
                                >{{ session('postulante')->investigaciones ?? old('investigaciones') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="disponibilidad">Disponibilidad</label>
                            <textarea class="form-control" name="disponibilidad" placeholder="" rows="5"
                                >{{ session('postulante')->disponibilidad ?? old('disponibilidad') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="congresos">Congresos</label>
                            <textarea class="form-control" name="congresos" rows="5"
                                >{{ session('postulante')->congresos ?? old('congresos') ?? '' }}</textarea>
                        </div>
                        <div class="col-sm-12 p-2">
                            <label for="con_profesionales">Conocimientos profesionales</label>
                            <textarea class="form-control" name="con_profesionales" rows="5"
                                >{{ session('postulante')->con_profesionales ?? old('con_profesionales') ?? '' }}</textarea>
                        </div>
                    </div>

                    <button type="sumbit" class="btn btn-primary px-4">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
