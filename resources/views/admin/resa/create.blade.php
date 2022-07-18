@extends('layouts.admin')

@section('content')

<div class="container">
    <form method="POST" action="{{route ('admin.resa.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NOM</label>
            <input type="text" name="nom" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">PRENOM</label>
            <input type="text" name="prenom" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">EMAIL</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">TELEPHONE</label>
            <input type="tel" name="tel" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">reservation</label>
            <input type="datetime-local" name="reserv" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre de personne</label>
            <input type="number" name="personne" class="form-control">
        </div>



        <div class="mb-3">
            <label class="form-label">Choisir une table</label>
            <select class="form-select" name="table_id" aria-label="Default select example">
                <option selected>choisir une table</option>
                @foreach($tables as $table)
                <option value="{{$table->id}}">{{$table->name}}</option>

                @endforeach
            </select>
        </div>



        <button type="submit"> AJouter</button>
    </form>


</div>

@endsection