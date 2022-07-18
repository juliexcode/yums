@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.carte.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">nom</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">prix</label>
            <input type="number" name="prix" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">categorie</label>
            <select class="form-select" name="categories" aria-label="Default select example">
                <option selected>Choisir une catégorie</option>
                <option value="Entrée">Entrée</option>
                <option value="plat">Plat</option>
                <option value="dessert">Dessert</option>
                <option value="boisson">boisson</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Choisir une image</label>
            <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <button type="submit"> AJouter</button>
    </form>


</div>

@endsection