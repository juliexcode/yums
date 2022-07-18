@extends('layouts.admin')

@section('content')

<div>
    <a href="{{route ('admin.tables.create')}}"><button> ajouter +</button></a>

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
                <td><a href="{{route ('admin.tables.edit',$table->id)}}">modifier </a>
                    <form method="POST" action="{{route('admin.tables.destroy', $table->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir supprimer ?')">
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