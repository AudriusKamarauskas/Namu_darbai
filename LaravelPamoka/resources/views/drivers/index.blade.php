@extends('layouts.layout')
@section('content')

<table>
    <tr>
        <th>{{ __('Name') }}</th>
        <th>{{ __('City') }}</th>
        <th>Veiksmai</th>
    </tr>

    @foreach($drivers as $driver)
    <tr>
        <td>{{ $driver->name }}</td>
        <td>{{ $driver->city }}</td>
        @if($driver->trashed())
        <td>
            <form action="{{ route('drivers.restore', ['driver' => $driver->driverId]) }}" methos="POST">
            {{ csrf_field() }}
            
            <input type="submit" value="Atstatyti"></form></td>
        @else
        
        <td><a href="{{ route('drivers.edit', ['driver' => $driver->driverId]) }}">Atnaujinti</a>
        <form action="{{ route('drivers.destroy', ['driver' => $driver->driverId]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Istrinti"></form>
        </td>
        
    </tr>     
    @endif        
    @endforeach
</table>
{{ $drivers->links() }}
<a href="http://localhost/LaravelPamoka/public/radars">Radarai</a>
@endsection
