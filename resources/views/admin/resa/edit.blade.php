@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.resa.update', $resa->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">NOM</label>
            <input type="text" name="nom" class="form-control" value="{{$resa->nom}}">

        </div>

        <div class="mb-3">
            <label class="form-label">PRENOM</label>
            <input type="text" name="prenom" class="form-control" value="{{$resa->prenom}}">

        </div>

        <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input type="email" name="email" class="form-control" value="{{$resa->email}}">

        </div>

        <div class="mb-3">
            <label class="form-label">TELEPHONE</label>
            <input type="tel" name="tel" class="form-control" value="{{$resa->tel}}">

        </div>

        <div class="mb-3">
            <label class="form-label">reservation de la date</label>
            <input type="date" name="date" class="form-control" value="{{$resa->date->format('Y-m-d')}}">


        </div>

        <div class="mb-3">
            <div>
                <label class="form-label">reservation de l'heure</label>
            </div>
            <label>JOUR</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="12h-13h" {{ $resa->heure == '12h-13h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    12h - 13h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="13h-14h" {{ $resa->heure == '13h-14h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    13h - 14h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="14h-15h" {{ $resa->heure == '14h-15h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    14h - 15h
                </label>
            </div>
            <label>SOIR</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="19h-20h" {{ $resa->heure == '19h-20h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    19h - 20h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="20h-21h" {{ $resa->heure == '20h-21h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    20h - 21h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="21h-22h" {{ $resa->heure == '21h-22h' ? 'checked' : ''}}>
                <label class=" form-check-label">
                    21h - 22h
                </label>
            </div>


        </div>






        <div class="mb-3">
            <label class="form-label">Nombre de personne</label>
            <input type="number" name="personnes" class="form-control" value="{{$resa->personnes}}">

        </div>



        <div class="mb-3">
            <label class="form-label">Choisir une table</label>
            <select class="form-select" name="table_id" aria-label="Default select example">
                <option selected>choisir une table</option>
                @foreach($tables as $table)
                <option value="{{$table->id}}" @selected($table->id == $resa->table_id)>{{$table->name}} ( Pour {{$table->chaises}} personnes)</option>

                @endforeach
            </select>
        </div>



        <button type="submit"> Modifier</button>
    </form>


</div>

@endsection