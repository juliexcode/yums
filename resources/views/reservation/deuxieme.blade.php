@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="background-color: blue;">
        FAIRE UNE RESERVATION
    </div>
    <form method="POST" action="{{route ('reservation.store.deuxieme')}}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Choisir une table</label>
            <select class="form-select" name="table_id" aria-label="Default select example">
                <option selected>choisir une table</option>
                @foreach($tables as $table)
                <option value="{{$table->id}}">{{$table->name}} ( Pour {{$table->chaises}} personnes)</option>

                @endforeach
            </select>
        </div>


        <a href="{{route('reservation.premier')}}">RETOUR</a>
        <button type="submit"> RESERVER</button>
    </form>


</div>
@endsection