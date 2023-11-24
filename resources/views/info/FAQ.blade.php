@extends('base')

@section('titulo')
    <title>Preguntas frecuentes</title>
@endsection

@section('breadcrumb')
    <p>
        /<a class="breadcrumb" href="/">Página principal</a>
        /<a class="breadcrumb" href="/faq">Preguntas frecuentes</a>
    </p>
@endsection

@section('contenido')
    <div class="container w-75 bg-white shadow mt-5 mb-5">
        <div class="col-xl-8 p-2">
            <h2 class="fw-bold text-left my-3">Preguntas Frequentes</h2>
        </div>
        <div class="row p-2">
            <div class="col-md-10 mx-auto">

                <div class="accordion" id="accordionTipos">
                @foreach ($tipos_p as $t)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen{{$t->idTipoPregunta}}A-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen{{$t->idTipoPregunta}}A-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen{{$t->idTipoPregunta}}A-collapseOne">
                            {{$t->descripcion}}
                        </button>
                        </h2>
                        <div id="panelsStayOpen{{$t->idTipoPregunta}}A-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen{{$t->idTipoPregunta}}A-headingOne">
                        <div class="accordion-body">

                        <div class="accordion" id="accordionPregunta">
                        @foreach ($t->preguntas as $p)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen{{$p->idPregunta}}-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen{{$p->idPregunta}}-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen{{$p->idPregunta}}-collapseOne">
                                    {{$p->pregunta}}
                                </button>
                                </h2>
                                <div id="panelsStayOpen{{$p->idPregunta}}-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen{{$p->idPregunta}}-headingOne">
                                <div class="accordion-body">
                                    <p>{{$p->respuesta}}<p>
                                </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                        </div>
                        </div>
                    </div>
                @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
