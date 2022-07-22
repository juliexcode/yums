@extends('layouts.guest')

@section('content')


<div class="container">
    <!-- Premiere section -->
    <div class="row " style="margin-top:20px ;">
        <div style="text-align: center;" class="col ">
            <h1 id="slogan">LAISSEZ VOUS TRANSPORTER PAR LES SAVEURS DU MONDE</h1>
            <a><button id="btn_res">RESERVEZ MAINTENANT</button></a>
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
            <p>le concept du restaurant yums</p>
            <a><button id="btn_carte">LA CARTE</button></a>
        </div>

    </div>

    <!-- image decoratif -->

</div>
<footer style="margin-top:20px ; border: 1px solid black; border-right:none">
    <div class="card-group">
        <div class="card" style="text-align: center; border:none; ">

            <div class="card-body">
                <h5 class="card-title" style="font-size: 30px;font-family: 'Lateef'; text-decoration: underline;  text-decoration-color: #FFF190;">ADRESSE</h5>
                <p class="card-text" style="font-size: 18px;font-family: 'Ubuntu', sans-serif;">14 rue de la Guadeloupe
                    ZA Foucherolles <br>
                    97490 - STE-CLOTILDE</p>

            </div>
        </div>
        <div class="card" style="text-align: center;border:none; ">

            <div class="card-body">
                <h5 class="card-title" style="font-size: 30px;font-family: 'Lateef';  text-decoration: underline;  text-decoration-color: #FFF190;"> HORAIRE</h5>
                <p class="card-text" style="font-size: 18px;font-family: 'Ubuntu', sans-serif; color: #E6C065;"> LUNDI-DIMANCHE </p>
                <p class="card-text" style="font-size: 18px;font-family: 'Ubuntu', sans-serif; ;">12h00-15h00 / 19h00-23h00</p>


            </div>
        </div>
        <div class="card" style="text-align: center;border:none;  ">

            <div class="card-body">
                <h5 class="card-title" style="font-size: 30px;font-family: 'Lateef';text-decoration: underline;  text-decoration-color: #FFF190;"> CONTACT</h5>
                <p class="card-text" style="font-size: 18px;font-family: 'Ubuntu', sans-serif;"><span style="color: #E6C065;">E-mail </span> <span>contact@yums.fr</span></p>
                <p class="card-text" style="font-size: 18px;font-family: 'Ubuntu', sans-serif;"> <span style="color: #E6C065;">Télephone </span><span>06 93 12 12 12</span></p>


            </div>
        </div>
    </div>
</footer>



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

        width: 226px;
        height: 59px;
        border: none;
        background: #E6C065;
        border-radius: 100px;
        font-family: 'Lateef';
        font-size: 40px;
        text-align: center;
        color: #FFFFFF;
    }
</style>