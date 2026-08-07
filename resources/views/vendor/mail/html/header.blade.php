@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ url('static/logos/logo.jpg') }}" class="logo" alt="Areia Soft Logo">
            @else
                {!! $slot !!}
            @endif
        </a>
    </td>
</tr>
