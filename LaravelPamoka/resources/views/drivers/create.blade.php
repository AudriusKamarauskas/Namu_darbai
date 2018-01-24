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
<form action="{{ route('drivers.store') }}" method="post">

    {{ csrf_field() }}

    <input type="string" name="name" placeholder="Vardas, Pavarde">
    <input type="string" name="city" placeholder="Miestas">
    <input type="submit" value="prideti">
</form>
@endsection