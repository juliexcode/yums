<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'YUMS') }}</title>


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
    <nav class="navbar navbar-expand-md navbar-light bg-light">


        <div class="container">
            <a class="navbar-brand" style="font-family:'Lateef', cursive; font-size:40px" href="{{route('welcome.index')}}">YUM'S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.carte.index')}}">PRODUITS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.tables.index')}}">TABLES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.resa.index')}}">RESERVATION</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        DÉCONNEXION

                                    </a>
                                </form>
                            </li>
                        </ul>
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

</body>

</html>