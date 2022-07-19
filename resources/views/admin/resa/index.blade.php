@extends('layouts.admin')

@section('content')

<div>
    <a href="{{route('admin.resa.create')}}">FAIRE UNE RESERVATION</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom Prenom</th>
                <th scope="col">Email / Tel</th>
                <th scope="col">Reservation</th>
                <th scope="col">Nombre de personnes</th>
                <th scope="col">Table</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $resa)
            <tr>
                <td>{{$resa->nom}} {{$resa->prenom}}</td>
                <td>{{$resa->email}} / {{$resa->tel}}</td>
                <td>{{date('d-m-Y', strtotime($resa->reserv))}}</td>
                <td>{{$resa->personnes}}</td>
                <td>{{$resa->table->name}}</td>
                <td><a href="{{route ('admin.resa.edit',$resa->id)}}">modifier </a>
                    <form method="POST" action="{{route('admin.resa.destroy', $resa->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir annuler?')">
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