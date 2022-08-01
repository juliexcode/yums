@extends('layouts.guest')

@section('content')
<div class="container" style="text-align: center; margin-top:120px">
    <h1 style="color: #E6C065; font-family: 'Lateef';"> NOUS VOUS REMERCIONS D'AVOIR RÉSERVER CHEZ NOUS! <BR>
        À TRÈS BIENTÔT!
    </h1>
    <div style="text-align:center ; margin-bottom:30px;">
        <a href="{{route('welcome.index')}}"><button id="btn_carte">ACCUEIL</button></a>
        <a href="{{route('carte.index')}}"><button id="btn_carte">LA CARTE</button></a>
    </div>
</div>
<div style="height:220px ;"></div>
@endsection
<style>
    #btn_carte {

        width: 189px;
        height: 45px;
        border: none;
        background: #E6C065;
        border-radius: 100px;
        font-family: 'Lateef';
        font-size: 30px;
        text-align: center;
        color: #FFFFFF;
    }

    #btn_carte:hover {

        background-color: rgba(250, 129, 168, 1);
        box-shadow: 3px 5px 2px rgba(230, 192, 101, 0.7);

    }
</style>