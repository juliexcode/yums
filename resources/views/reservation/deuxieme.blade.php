@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="margin-top: 20px;background: rgba(250, 129, 168, 0.2); margin-bottom:20px;">
        <h1 style="font-family: 'Lateef';font-size: 64px; text-align: center;color: #E6C065;">
            FAIRE UNE RESERVATION</h1>
    </div>
    <div style="text-align: center;">
        <p style="font-family: 'Lateef';font-size: 25px;color: #E6C065;">Si aucune table ne s’affiche, il n'y a pas de disponibilité pour le jour et/ou l’heure que vous avez demandé.</p>
    </div>
    <div id="formulaire">
        <form style="margin-top:40px ; margin-left:10px;margin-right:10px;margin-bottom:40px ; " method="POST" action="{{route ('reservation.store.deuxieme')}}">
            @csrf

            <div class="mb-3">
                <label class="form-label" id="champsText">CHOISIR UNE TABLE</label>
                <select id="champs" class="form-select" name="table_id" aria-label="Default select example">

                    @foreach($tables as $table)
                    <option selected value="{{$table->id}} ">{{$table->name}} ( {{$table->location->name}} )</option>

                    @endforeach
                </select>
            </div>
            <div class="row" style="margin-top:30px ;">
                <div class="col">
                    <a href="{{route('reservation.premier')}}" id="btn_prec">PRÉCEDENT</a>
                </div>
                <div class="col">
                    <button type="submit" id="btn_res"> RÉSERVER</button>
                </div>
            </div>
        </form>
    </div>

</div>

<div style="margin-top:130px ;">

</div>
@endsection

<style>
    #btn_prec {
        color: black;
        text-decoration: none;
        background-color: rgba(255, 241, 144, 1);
        border: 1px solid rgba(230, 192, 101, 1);
        border-radius: 20px;
        font-family: 'Lateef';
        font-size: 25px;
    }

    #btn_res {
        width: 145px;
        height: 47px;
        background-color: rgba(255, 241, 144, 1);
        border: 1px solid rgba(230, 192, 101, 1);
        border-radius: 20px;
        font-family: 'Lateef';
        font-size: 25px;
    }

    #formulaire {


        border: 5px solid rgba(230, 192, 101, 0.4);
        border-radius: 30px;
    }

    #champsText {
        font-family: 'Ubuntu';

    }

    #champs {
        border: 1px solid #E6C065;
        border-radius: 10px;
    }
</style>