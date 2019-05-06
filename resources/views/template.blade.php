<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Bienvenue sur le site de la commune de Diane Capelle">
    <meta name="author" content="Kevin Cluzel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Diane Capelle</title>
</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <h1>Commune de Diane Capelle</h1>
    </div>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" alt="Logo" style="width:25px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('/')}}'>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('post')}}'>Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('contact')}}'>Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('email')}}'>Inscription</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-10">
            @yield('content')
        </div>
        <div class="sidenav">
            <p>Partenaires:</p>
        </div>
    </div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
</html>
