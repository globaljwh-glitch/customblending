<h2>{{ $title }}</h2>

<table cellpadding="6" cellspacing="0" border="1" width="100%">
    @foreach($data as $key => $value)
        <tr>
            <td><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong></td>
            <td>
                @if(is_array($value))
                    <pre>{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>
                @else
                    {{ $value }}
                @endif
            </td>
        </tr>
    @endforeach
</table>

<p>
    <strong>Submitted On:</strong> {{ now()->format('d M Y, h:i A') }}
</p>
