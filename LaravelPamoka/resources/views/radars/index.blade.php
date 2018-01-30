@extends('layouts.layout')
@section('content')
@section('header_style')
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
@endsection

<table>
    <tr>
        <th>{{ trans('radars.date') }}</th>
        <th>{{ trans('radars.number') }}</th>
        <th>{{ trans('radars.speed', ['metrics' => 'KM/H']) }}</th>
        <th>{{ trans('radars.drivers') }}</th>
        <th>{{ trans('radars.actions') }}</th>
    </tr>

    @foreach($radars as $radar)
    <tr>
        <td>{{ $radar->date }}</td>
        <td>{{ $radar->number }}</td>
        <td>{{ round($radar->distance / $radar->time * 3.6) }}</td>
        @if ( Isset ($radar->created_by))
        <td>{{ $radar->created_by }} </td>
        @endif
        @if ($radar->drivers)
        <td>{{ $radar->drivers->name }}</td>
        @endif
        @if($radar->trashed())
        <td>
            <form action="{{ route('radars.restore', ['radar' => $radar->id]) }}" methos="POST">
            {{ csrf_field() }}
            
            <input type="submit" value="Atstatyti"></form></td>
        @else
        
        <td><a href="{{ route('radars.edit', ['radar' => $radar->id]) }}">Atnaujinti</a>
        <form action="{{ route('radars.destroy', ['radar' => $radar-> id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Istrinti"></form>
        </td>
        
    </tr>     
    @endif   
    @endforeach
</table>

{{ $radars->links() }}

<br><a href="http://localhost/LaravelPamoka/public/drivers">Vairuotojai</a>
<br><a href="http://localhost/LaravelPamoka/public/radars/create">Sukurti radara</a>

@endsection