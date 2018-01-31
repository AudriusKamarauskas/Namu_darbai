@extends('layouts.layout')
@section('content')
@section('header_style')
<style>
    input {
        width: 500px;
        height: 50px;
        margin: 15px;
    }
</style>
@endsection
<form action="{{ route('drivers.update', ['driver' => $driver->driverId]) }}" method="POST">
        
        {{ csrf_field() }}
        {{ method_field('PUT')}}

        <input type="string" name="name" value="{{ $driver->name }}">
        <input type="string" name="city" value="{{ $driver->city }}">
        <input type="submit" value="Atnaujinti">
    </form>
</div>
@endsection