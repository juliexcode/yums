@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="background-color: blue;">
        FAIRE UNE RESERVATION
    </div>
    <form method="POST" action="{{route ('admin.resa.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NOM</label>
            <input type="text" name="nom" class="form-control" class="@error('nom') is-invalid @enderror">
            @error('nom')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le nom</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">PRENOM</label>
            <input type="text" name="prenom" class="form-control" class="@error('prenom') is-invalid @enderror">
            @error('prenom')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le prenom</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input type="email" name="email" class="form-control" class="@error('email') is-invalid @enderror">
            @error('email')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner l'email</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">TELEPHONE</label>
            <input type="tel" name="tel" class="form-control" class="@error('tel') is-invalid @enderror">
            @error('tel')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le numéro de télephone</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">reservation de la date</label>
            <input type="date" name="date" class="form-control" class="@error('date') is-invalid @enderror">

            @error('date')
            <div style="color:rgba(230, 192, 101, 1) ; "> {{$message}}</div>
            @enderror

        </div>

        <div class="mb-3">
            <div>
                <label class="form-label">reservation de l'heure</label>
            </div>
            <label>JOUR</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="12h-13h" required>
                <label class="form-check-label">
                    12h - 13h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="13h-14h">
                <label class="form-check-label">
                    13h - 14h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="14h-15h">
                <label class="form-check-label">
                    14h - 15h
                </label>
            </div>
            <label>SOIR</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="19h-20h">
                <label class="form-check-label">
                    19h - 20h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="20h-21h">
                <label class="form-check-label">
                    20h - 21h
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="heure" value="21h-22h">
                <label class="form-check-label">
                    21h - 22h
                </label>
            </div>
            @error('heure')
            <div style="color:rgba(230, 192, 101, 1) ; "> {{$message}}</div>
            @enderror

        </div>






        <div class="mb-3">
            <label class="form-label">Nombre de personne</label>
            <input type="number" name="personnes" class="form-control" class="@error('personnes') is-invalid @enderror">
            @error('personnes')
            <div style="color:rgba(230, 192, 101, 1) ;">veuillez renseigner le nombres de personnes</div>
            @enderror
        </div>



        <div class="mb-3">
            <label class="form-label">Choisir une table</label>
            <select class="form-select" name="table_id" aria-label="Default select example">
                <option selected>choisir une table</option>
                @foreach($tables as $table)
                <option value="{{$table->id}}">{{$table->name}} ( Pour {{$table->chaises}} personnes)</option>

                @endforeach
            </select>
        </div>



        <button type="submit"> faire une réservation</button>
    </form>


</div>
@endsection