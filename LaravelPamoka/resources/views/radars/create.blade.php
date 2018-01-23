<style>
    input {
        width: 500px;
        height: 50px;
        margin: 15px;
    }
</style>

<form action="{{ route('radars.store') }}" method="post">

    {{ csrf_field() }}
    {{ method_field('PUT')}}
    
    <input type="string" name="date" placeholder="Iveskite data">
    <input type="string" name="number" placeholder="Iveskite numeri">
    <input type="string" name="distance" placeholder="Iveskite atstuma">
    <input type="string" name="time" placeholder="Iveskite laika">
    <input type="submit" value="prideti">
</form>