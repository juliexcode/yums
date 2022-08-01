<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lateef&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu&display=swap');
    </style>
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="font-family: 'Ubuntu', sans-serif;">
    <nav id="menu" class="navbar navbar-expand-md navbar-light bg-light">


        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('welcome.index')}}"> <img src="/images/logo.png" style="width:102px ;height:48px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " id="lien" href="{{route('welcome.index')}}">ACCUEIL</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" id="lien" href="{{route('carte.index')}}">LA CARTE</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="lien" href="{{route('reservation.premier')}}">FAIRE UNE RÉSERVATION</a>
                    </li>
                </ul>



            </div>
        </div>
    </nav>

    <main>
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @endif
        @if(session()->has('warning'))
        <div class="alert alert-success" role="alert">
            {{session()->get('warning')}}
        </div>
        @endif
        @if(session()->has('danger'))
        <div class="alert alert-warning" role="alert">
            {{session()->get('danger')}}
        </div>
        @endif

        @yield('content')
    </main>
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
</body>

</html>

<style>
    #menu {
        box-shadow: 0px 8px 12px rgba(142, 142, 142, 0.5);
    }

    #lien {
        color: rgba(0, 0, 0, 1);

    }

    #lien:hover {
        text-decoration: overline;
        text-decoration-color: rgba(230, 192, 101, 1);
    }

    #lien:active {
        color: rgba(230, 192, 101, 1);

    }
</style>