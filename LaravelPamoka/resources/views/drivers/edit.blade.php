<style>
    input {
        width: 500px;
        height: 50px;
        margin: 15px;
    }
</style>

<form action="{{ route('drivers.update', ['driver' => $driver->driverId]) }}" method="POST">
        
        {{ csrf_field() }}

        <input type="string" name="name" value="{{ $driver->name }}">
        <input type="string" name="city" value="{{ $driver->city }}">
        <input type="submit" value="Atnaujinti">
    </form>
</div>