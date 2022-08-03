@extends('layouts.admin')

@section('content')

<div class="container">
    <a href="{{route('admin.resa.create')}}"><button id="btn_ajt">Ajouter une réservation</button></a>
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
                <td style="overflow-wrap: anywhere">{{$resa->nom}} {{$resa->prenom}}</td>
                <td style="overflow-wrap: anywhere">{{$resa->email}} / {{$resa->tel}}</td>
                <td style="overflow-wrap: anywhere">{{date('d-m-Y', strtotime($resa->date))}} / {{$resa->heure}}</td>
                <td>{{$resa->personnes}}</td>
                <td style="overflow-wrap: anywhere">{{$resa->table->name}}</td>
                <td><a href="{{route ('admin.resa.edit',$resa->id)}}"><button id="btn_mod">Modifier</button> </a>
                    <form method="POST" action="{{route('admin.resa.destroy', $resa->id)}}" onsubmit="return confirm('Êtes-vous sûre de vouloir annuler?')">
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