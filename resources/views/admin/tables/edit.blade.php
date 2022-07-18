@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.tables.update',$table->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Numéro de table</label>
            <input type="text" name="name" value="{{$table->name}}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombres de chaises</label>
            <input type="number" name="chaises" value="{{$table->chaises}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Endroît de la table</label>
            <select class="form-select" name="location" aria-label="Default select example">

                @foreach(App\Enums\TableLocation::cases() as $location)
                <option value="{{$location->value}}" @selected($table->location->value == $location->value)>{{$location->name}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit"> Modifier</button>
    </form>


</div>

@endsection