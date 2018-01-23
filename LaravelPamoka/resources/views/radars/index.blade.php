<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<table>
    <tr>
        <td>Data</td>
        <td>Numeris</td>
        <td>Greitis Km/h</td>
        <td>Veiksmai</td>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ round($radar->distance / $radar->time * 3.6) }}</td>
        <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a>
        <form action="{{ route('radars.destroy', ['radar' => $radar-> id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Istrinti"></form>
        </td>
        
    </tr>        
    @endforeach
</table>