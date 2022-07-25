@extends('layouts.guest')

@section('content')
<div class="container">
    <div>
        <a href="#">TOUT</a>
        <a href="#">ENTREE</a>
        <a href="{{route('carte.plat')}}">PLAT</a>
        <a href="#">DESSERT</a>
        <a href="#">BOISSON</a>
    </div>
    <div class="row">

        @foreach($plats as $plat)
        <div style="margin-top:20px ;" class="col">
            <div class="card" style="width: 18rem; text-align:center; align-items:center;">
                <img src="{{Storage::url($plat->image)}}" width="250px" height="300px">
                <div class="card-body">

                    <h5 class="card-title"> {{$plat->name}}</h5>
                    <p class="card-text"> {{$plat->description}}</p>
                    <p> {{$plat->prix}}
                    </p>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>
@endsection