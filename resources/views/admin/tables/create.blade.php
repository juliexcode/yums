@extends('layouts.admin')

@section('content')

<div class="container">

    <form method="POST" action="{{route ('admin.tables.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Numéro de table</label>
            <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror">
            @error('name')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le numéro de table</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nombres de chaises</label>
            <input type="number" name="chaises" class="form-control" class="@error('chaises') is-invalid @enderror">
            @error('chaises')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le nombre de chaise sur la table</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Table</label>
            <select class="form-select" name="location" aria-label="Default select example">
                <option selected>Choisir un endroît</option>
                @foreach(App\Enums\TableLocation::cases() as $location)
                <option value="{{$location->value}}">{{$location->name}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit"> Ajouter</button>
    </form>


</div>

@endsection