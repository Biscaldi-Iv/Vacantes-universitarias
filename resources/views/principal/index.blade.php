@extends('base')

@section('titulo')
    <title>Vacantes Universitarias</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb"href="/">Página principal</a>
    </p>
@endsection

@section('contenido')
    <div class="col p-2">
        <div class="input-group">
            <form>
                @csrf
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary">search</button> 
                <a class="btn btn-outline-primary" href="/registrovacante">Agregar Vacante</a>
            </form>
        </div>
        <div class="row p-2">
            <div class="col ">
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <a href="/maquetas/infovacante.html">
                                <h6 class="card-title">Vacante</h6>
                            </a>
                            <div class="col">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-md-auto p-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <a href="/maquetas/infovacante.html">
                                <h6 class="card-title">Vacante</h6>
                            </a>
                            <div class="col">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-md-auto p-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div><div class="card card-border">
                    <div class="card-body">
                        <div class="row">
                            <a href="/maquetas/infovacante.html">
                                <h6 class="card-title">Vacante</h6>
                            </a>
                            <div class="col">
                                <p>Descripción breve</p>
                            </div>
                            <div class="col-md-auto p-2">
                                <button type="button" class="btn btn-outline-primary">Postularse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

