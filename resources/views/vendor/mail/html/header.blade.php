@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<div class="bg-white">
<img src="{{ URL::to('/') }}/img/Vacantes.png" class="logo" alt="AcademyHub Logo" height="25%" width="25%">
</div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
