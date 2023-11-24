@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            <div class="bg-white" display="block" width="100%">
                <img src="{{ URL::to('/') }}/img/Vacantes.png" class="logo" alt="AcademyHub Logo" height="25%"
                    width="25%">
            </div>
            @if (trim($slot) === 'Laravel')
                {{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
