@component('mail::message')
@if ($usuario)
Estimado/a {{ $usuario->nombre . " " . $usuario->apellido }}.
@endif

Se ha actualizado la postulacion {{ $postulacion->vacante->tituloVacante}}
{{--
@component('mail::button',['url' => 'orden/' . $postulacion->vacante->id])
    Ver orden de mérito
@endcomponent --}}

@endcomponent
