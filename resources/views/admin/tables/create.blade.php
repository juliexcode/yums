@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.tables.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Numéro de table</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombres de chaises</label>
            <input type="number" name="chaises" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Choisir une table</label>
            <select class="form-select" name="location" aria-label="Default select example">
                <option selected>Table</option>
                @foreach(App\Enums\TableLocation::cases() as $location)
                <option value="{{$location->value}}">{{$location->name}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit"> AJouter</button>
    </form>


</div>

@endsection