@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="background-color: blue;">
        FAIRE UNE RESERVATION
    </div>
    <form method="POST" action="{{route ('reservation.store.premier')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NOM</label>
            <input type="text" name="nom" class="form-control" value="{{$resa->nom ?? ''}}">

        </div>

        <div class="mb-3">
            <label class="form-label">PRENOM</label>
            <input type="text" name="prenom" class="form-control" value="{{$resa->prenom ?? ''}}">

        </div>

        <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input type="email" name="email" class="form-control" value="{{$resa->email ?? ''}}">

        </div>

        <div class="mb-3">
            <label class="form-label">TELEPHONE</label>
            <input type="tel" name="tel" class="form-control" value="{{$resa->tel ?? ''}}">

        </div>

        <div class="mb-3">
            <label class="form-label">RESERVER LA DATE</label>
            <input type="date" name="date" class="form-control" min="{{$min_date->format('Y-m-d')}}" value="{{$resa ? $resa->date->format('Y-m-d') : ''}}">


        </div>



        <div class="mb-3">
            <div>
                <label class="form-label">RESERVER L'HEURE</label>
            </div>
            <select class="form-select" name="heure" aria-label="Default select example">
                <option selected> {{$resa->heure ?? ''}} choisir un créneau horaire </option>
                <option value="12h-13h">12h - 13h</option>
                <option value="13h-14h">13h - 14h</option>
                <option value="14h-15h">14h - 15h</option>
                <option value="19h-20h">19h - 20h</option>
                <option value="20h-21h">20h - 21h</option>
                <option value="21h-22h">21h - 22h</option>
            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Nombre de personne</label>
            <input type="number" name="personnes" class="form-control" value="{{$resa->personnes ?? ''}}">

        </div>







        <button type="submit">Suivant</button>
    </form>


</div>
@endsection