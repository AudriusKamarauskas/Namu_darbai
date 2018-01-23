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
        <td>Vardas, Pavarde</td>
        <td>Miestas</td>
        <td>Veiksmai</td>
    </tr>

    @foreach($drivers as $driver)
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>
        <td><a href="{{ route('drivers.edit', ['driver' => $driver->driverId]) }}">Atnaujinti</a></td>
    </tr>        
    @endforeach
</table>