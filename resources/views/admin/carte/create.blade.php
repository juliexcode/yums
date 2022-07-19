@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.carte.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">nom</label>
            <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror">
            @error('name')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le nom du produit</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea class="form-control" name="description" class="@error('description') is-invalid @enderror"></textarea>
            @error('description')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner la description du produit</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">prix</label>
            <input type="number" name="prix" class="form-control" class="@error('prix') is-invalid @enderror">
            @error('prix')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le prix du produit</div>
            @enderror
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
            <input class="form-control" name="image" type="file" id="formFile" class="@error('image') is-invalid @enderror">
            @error('image')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez choisir une image du produit</div>
            @enderror

        </div>
        <button type=" submit"> AJouter</button>
    </form>


</div>

@endsection