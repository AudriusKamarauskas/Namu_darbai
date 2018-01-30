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



<form action="{{ route('radars.store') }}" method="post">

    {{ csrf_field() }}
    {{ method_field('PUT')}}
    
    <input value="{{ old('date') }}" type="string" name="date" placeholder="Iveskite data">
    <input value="{{ old('number') }}" type="string" name="number" placeholder="Iveskite numeri">
    <input value="{{ old('distance') }}" type="string" name="distance" placeholder="Iveskite atstuma">
    <input value="{{ old('time') }}" type="string" name="time" placeholder="Iveskite laika">
    <input value="{{ auth()->user()->id }}" type="hidden" name="created_by">
    <input type="submit" value="prideti">
</form>
@endsection