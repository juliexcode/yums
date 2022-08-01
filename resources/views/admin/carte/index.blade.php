@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{route ('admin.carte.create')}}"><button id="btn_ajt"> Ajouter un produit à la carte</button></a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($cartes as $carte)
            <tr>
                <td> <img src="{{Storage::url($carte->image)}}" width="80px" height="90px"></td>
                <th style="overflow-wrap: anywhere" scope="row">{{$carte->name}}</th>
                <td style="overflow-wrap: anywhere">{{$carte->description}}</td>
                <td>{{$carte->prix}}</td>
                <td><a href="{{route ('admin.carte.edit',$carte->id)}}"><button id="btn_mod">Modifier</button> </a>
                    <form method="POST" action="{{route('admin.carte.destroy', $carte->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btn_sup"> Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
<style>
    #btn_ajt {

        height: 47px;
        background: #FFF190;
        border: 1px solid #E6C065;
        border-radius: 10px;
    }

    #btn_ajt:hover {
        background: rgba(250, 129, 168, 1);
    }

    #btn_mod {

        height: 40px;
        background: #FFF190;
        border: 1px solid #E6C065;
        border-radius: 15px;
    }

    #btn_sup {
        margin-top: 10px;
        height: 40px;
        background: #FFF190;
        border: 1px solid #E6C065;
        border-radius: 15px;
    }
</style>