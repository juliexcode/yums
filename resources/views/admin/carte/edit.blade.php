@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.carte.update',$carte->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">nom</label>
            <input type="text" name="name" value="{{$carte->name}}" class="form-control">

        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea class="form-control" name="description">
            {{$carte->description}}
            </textarea>

        </div>
        <div class="mb-3">
            <label class="form-label">prix</label>
            <input type="number" name="prix" value="{{$carte->prix}}" class="form-control">

        </div>
        <div class="mb-3">
            <label class="form-label">categorie</label>
            <select class="form-select" name="categories" aria-label="Default select example">
                <option selected>{{$carte->categories}}</option>
                <option value="Entrée">Entrée</option>
                <option value="plat">Plat</option>
                <option value="dessert">Dessert</option>
                <option value="boisson">boisson</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Choisir une image</label>
            <div>
                <img src="{{Storage::url($carte->image)}}" width="80px" height="90px">
            </div>
            <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <button type="submit">Modifier</button>
    </form>


</div>

@endsection