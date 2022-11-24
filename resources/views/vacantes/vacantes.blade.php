@extends('base')

@section('titulo')
    <title>Vacantes</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>/
        <a class="breadcrumb"href="/vacantes">Vacantes</a>
    </p>
@endsection

@section('contenido')
    <div class="col-xl-8 p-2">
        <h2 class="fw-bold text-left my-3">Lista de vacantes? ya esta antes pero bueno</h2>
    </div>
        <div class="row">
            <div class="col-sm">
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="card-title">Vacante</h6>
                            <div class="col-10">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="card-title">Vacante</h6>
                            <div class="col-10">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div><div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <h6 class="card-title">Vacante</h6>
                            <div class="col-10">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
@endsection
