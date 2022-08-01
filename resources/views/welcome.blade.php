@extends('layouts.guest')

@section('content')


<div class="container">
    <!-- Premiere section -->
    <div class="row " style="margin-top:20px ;">
        <div style="text-align: center;" class="col ">
            <h1 id="slogan">LAISSEZ VOUS TRANSPORTER PAR LES SAVEURS DU MONDE</h1>
            <a href="{{route('reservation.premier')}}"><button id="btn_res">RESERVEZ MAINTENANT</button></a>
        </div>

        <div style="text-align: center;" class="col ">
            <img src="/images/pageAccueil.jpg" style="width:460px;height: 390px; margin-top:30px; ">
        </div>

    </div>

    <!-- deuxieme section -->
    <div class="row " style="margin-top:20px ; background: rgba(250, 129, 168, 0.2);">

        <div style="text-align: center;" class="col ">
            <img src="/images/imageSection.jpg" style="width: 460px;height: 350px; margin-top:30px;margin-bottom:30px;">
        </div>

        <div style="margin-top:20px ;" class="col ">
            <h1 id="concept">LE CONCEPT</h1>
            <p>Le YUM’S vous embarque pour un voyage culinaire en revisitant des plats du monde, en passant de l’Inde avec ses épices, au Mexique avec ses spécialités piquantes ou encore le Japon avec leur fameuse recette de ramen ou l’Italie avec leurs merveilleuses pizzas.<br>
                Grâce à notre concept plus besoin de voyager, tout ce passe dans votre assiette.<br>
                Venez en famille, entre amis ou seul avec nos plats à partager (ou pas).<br>
                Selon vos envies vous aurez le choix parmi tant de plats et de desserts, avec notre petite touche maison qui fera ravir vos papilles.<br>
                Rendez-vous sur notre carte pour en découvrir plus.</p>
            <div style="text-align:center ; margin-bottom:30px;">
                <a href="{{route('carte.index')}}"><button id="btn_carte">LA CARTE</button></a>
            </div>
        </div>

    </div>

    <!-- image decoratif -->

</div>




@endsection
<style>
    #slogan {


        font-family: 'Lateef';
        font-size: 64px;
        text-align: center;
        margin-top: 50px;
        color: #E6C065;
    }

    #btn_res {

        width: 390px;
        height: 90px;
        border: none;
        background: #E6C065;
        border-radius: 100px;
        font-family: 'Lateef';
        font-size: 36px;
        text-align: center;
        color: #FFFFFF;
    }

    #btn_res:hover {

        background-color: rgba(250, 129, 168, 1);
        box-shadow: 3px 5px 2px rgba(230, 192, 101, 0.7);

    }

    #concept {
        color: rgba(250, 129, 168, 1);
        font-family: 'Lateef';
        font-size: 64px;
        text-decoration: underline;
        text-decoration-color: #E6C065;

    }

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