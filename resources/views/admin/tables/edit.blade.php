@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.tables.update',$table->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Numéro de table</label>
            <input id="champs" type="text" name="name" value="{{$table->name}}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombres de chaises</label>
            <input id="champs" type="number" name="chaises" value="{{$table->chaises}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Endroît de la table</label>
            <select id="champs" class="form-select" name="location" aria-label="Default select example">

                @foreach(App\Enums\TableLocation::cases() as $location)
                <option value="{{$location->value}}" @selected($table->location->value == $location->value)>{{$location->name}}</option>

                @endforeach
            </select>
        </div>

        <button type="submit" id="btn_ajt"> Modifier</button>
    </form>


</div>

@endsection
<style>
    #btn_ajt {

        height: 47px;
        background: #FFF190;
        border: 1px solid #E6C065;
        border-radius: 10px;
    }

    #champs {
        border: 1px solid #E6C065;
        border-radius: 10px;
    }
</style>