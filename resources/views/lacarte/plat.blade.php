@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="margin-top:20px ; ">
        <a id="lien2" href="{{route('carte.index')}}">TOUT</a>
        <a id="lien2" href="{{route('carte.entree')}}">ENTREE</a>
        <a id="lien2" href="{{route('carte.plat')}}">PLAT</a>
        <a id="lien2" href="{{route('carte.dessert')}}">DESSERT</a>
        <a id="lien2" href="{{route('carte.boisson')}}">BOISSON</a>
    </div>

    <div class="row">

        @foreach($cartes as $carte)
        <div style="margin-top:20px ;" class="col">
            <div class="card" style="width: 19rem; height: 35rem; text-align:center; align-items:center; border: 2px solid #E6C065;">
                <img src="{{Storage::url($carte->image)}}" width="250px" height="300px" style="margin-top:10px ;">
                <div class="card-body">

                    <h5 class="card-title" style="font-family: 'Lateef';font-size:40px;overflow-wrap: anywhere;"> {{$carte->name}}</h5>
                    <p class="card-text" style="font-family: 'Ubuntu';;overflow-wrap: anywhere;"> {{$carte->description}}</p>
                    <p style="font-family: 'Lateef';font-size:30px;"> {{$carte->prix}}
                    </p>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>
@endsection
<style>
    #lien2 {
        font-family: 'Lateef';
        font-size: 20px;
        text-decoration: underline;
        text-decoration-color: rgba(230, 192, 101, 1);
        color: black;
        padding-left: 20px;
    }

    #lien2:hover {


        text-decoration-color: rgba(250, 129, 168, 1);


    }
</style>