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

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('drivers.store') }}" method="post">

    {{ csrf_field() }}

    <input value="{{ old('name') }}" type="string" name="name" placeholder="Vardas, Pavarde">
    <input value="{{ old('city') }}" type="string" name="city" placeholder="Miestas">
    <input type="submit" value="prideti">
</form>
@endsection