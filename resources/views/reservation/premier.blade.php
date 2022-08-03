@extends('layouts.guest')

@section('content')
<div class="container">
    <div style="margin-top: 20px;background: rgba(250, 129, 168, 0.2); margin-bottom:20px;">
        <h1 style="font-family: 'Lateef';font-size: 64px; text-align: center;color: #E6C065;">
            FAIRE UNE RESERVATION</h1>
    </div>
    <div style="text-align: center;">
        <p style="font-family: 'Lateef';font-size: 25px;color: #E6C065;">Pour toutes réservations de plus de 10 personnes, merci de contacter directement le restaurant 0693121212,</p>
        <p style="font-family: 'Lateef';font-size: 25px;color: #E6C065;">merci de votre compréhension.</p>
    </div>
    <div id="formulaire">
        <form style="margin-top:40px ; margin-left:10px;margin-right:10px; " method="POST" action="{{route ('reservation.store.premier')}}">
            @csrf
            <div class="row">
                <div class="col">
                    <label class="form-label" id="champsText">NOM</label>
                    <input id="champs" type="text" name="nom" class="form-control" maxlength="12" value="{{$resa->nom ?? ''}}" placeholder="Votre nom">

                </div>

                <div class="col">
                    <label class="form-label" id="champsText">PRÉNOM</label>
                    <input id="champs" type="text" name="prenom" class="form-control" maxlength="12" value="{{$resa->prenom ?? ''}}" placeholder="Votre prénom">

                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" id="champsText">E-MAIL</label>
                <input id="champs" type="email" name="email" class="form-control" value="{{$resa->email ?? ''}}" placeholder="Votre e-mail">

            </div>

            <div class="mb-3">
                <label class="form-label" id="champsText">NUMÉRO DE TÉLÉPHONE</label>
                <input id="champs" type="tel" name="tel" class="form-control" maxlength="10" value="{{$resa->tel ?? ''}}" placeholder="Votre numéro de téléphone">

            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label" id="champsText">CHOISIR LA DATE</label>
                    <input id="champs" type="date" name="date" class="form-control" min="{{$min_date->format('Y-m-d')}}" value="{{$resa ? $resa->date->format('Y-m-d') : ''}}">


                </div>

                <div class="col">
                    <div>
                        <label class="form-label" id="champsText">CHOISIR UN CRÉNEAU HORAIRE</label>
                    </div>
                    <select id="champs" class="form-select" name="heure" aria-label="Default select example">
                        <option selected> {{$resa->heure ?? ''}} </option>
                        <option value="12h - 13h">12h - 13h</option>
                        <option value="13h - 14h">13h - 14h</option>
                        <option value="14h - 15h">14h - 15h</option>
                        <option value="19h - 20h">19h - 20h</option>
                        <option value="20h - 21h">20h - 21h</option>
                        <option value="21h - 22h">21h - 22h</option>
                    </select>

                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="form-label" id="champsText">NOMBRE DE PERSONNE</label>
                    <input id="champs" type="number" name="personnes" min="1" max="10" class="form-control" value="{{$resa->personnes ?? ''}}" placeholder="Entre 1 et 10">

                </div>




                <div class="col">

                </div>
                <div>
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col">
                            <button id="btn_svt" type="submit">Suivant</button>
                        </div>
                        <div>
        </form>

    </div>
</div>


@endsection

<style>
    #btn_svt {
        width: 145px;
        height: 47px;
        font-family: 'Lateef';
        font-size: 25px;
        background: #FFF190;
        border: 1px solid #E6C065;
        border-radius: 20px;
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