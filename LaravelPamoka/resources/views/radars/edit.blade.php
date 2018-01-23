<style>
    input {
        width: 500px;
        height: 50px;
        margin: 15px;
    }
</style>

<form action="{{ route('radars.update', ['radar' => $radar->id]) }}" method="POST">
        
        {{ csrf_field() }}
        {{ method_field('PUT')}}

        <input type="string" name="date" value="{{ $radar->date }}">
        <input type="string" name="number" value="{{ $radar->number }}">
        <input type="string" name="distance" value="{{ $radar->distance }}">
        <input type="string" name="time" value="{{ $radar->time }}">
        <input type="submit" value="Atnaujinti">
    </form>
</div>

