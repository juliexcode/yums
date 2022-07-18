@extends('layouts.admin')

@section('content')

<div>
    <a href="{{route ('admin.carte.create')}}"><button> ajouter +</button></a>
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
                <td>{{$carte->name}}</td>
                <td>{{$carte->description}}</td>
                <td>{{$carte->prix}}</td>
                <td><a href="{{route ('admin.carte.edit',$carte->id)}}">modifier </a>
                    <form method="POST" action="{{route('admin.carte.destroy', $carte->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection