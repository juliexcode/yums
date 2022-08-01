@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{route ('admin.tables.create')}}"><button id="btn_ajt"> Ajouter une table</button></a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">numéro de table</th>
                <th scope="col">Nombres de chaises</th>
                <th scope="col">Emplacement</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
            <tr>

                <td>{{$table->name}}</td>
                <td>{{$table->chaises}}</td>
                <td>{{$table->location->name}}</td>
                <td><a href="{{route ('admin.tables.edit',$table->id)}}"> <button id="btn_mod">Modifier</button> </a>
                    <form method="POST" action="{{route('admin.tables.destroy', $table->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer ?')">
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