@component('mail::message')
@if ($data->nombre)
{{ $data->nombre }} ha realizado una consulta sobre el sistema AcademyHub.
@else
Un usuario ha realizado una consulta sobre el sistema AcademyHub.
@endif

La Consulta ha sido la siguiente: 

{{ $data->mensaje}}

Su información de contacto es: {{ $data->email }}

Saludos Cordiales, AcademyHub

@endcomponent
