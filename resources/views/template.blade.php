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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin="" />
    <link rel="icon" type="image/png" href="/img/logo.png">
    <title>Diane Capelle</title>
</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <h1>{{ trans('interface.titre') }}</h1>
    </div>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#">
            <img src="/img/logo.png" alt="Logo" style="width:25px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('/')}}'>{{ trans('interface.accueil') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('post')}}'>{{ trans('interface.actualites') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('contact')}}'>{{ trans('interface.contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('email')}}'>{{ trans('interface.inscription') }}</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if(Auth::check())
                    @if(Auth::user()->admin)
                        <li class="nav-item">
                            <a class="nav-link" href='{{ url('user')}}'>Administration</a>
                        </li>
                    @endif
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
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif
                <!--Localisation-->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownFlag" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img width="32" height="32" alt="{{ session('locale') }}"  src="{!! asset('img/flags/' . session('locale') . '-flag.png') !!}" />
                    </a>
                    <div id="flags" class="dropdown-menu" aria-labelledby="navbarDropdownFlag">
                        @foreach(config('app.locales') as $locale)
                            @if($locale != session('locale'))
                                <a class="dropdown-item" href="{{ route('language', $locale) }}">
                                    <img width="32" height="32" alt="{{ session('locale') }}"  src="{!! asset('img/flags/' . $locale . '-flag.png') !!}" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-9">
            @yield('content')
        </div>
        <div class="d-none d-lg-block col-lg-3">
            <table class="table">
                <thead>
                <tr>
                    <th>{{ trans('interface.partenaires') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="https://www.cc-sms.fr/" target="_blank">{{ trans('interface.cc') }}</a></td>
                </tr>
                <tr>
                    <td><a href="https://www.langatte-hebergement-loisir.fr/" target="_blank">{{ trans('interface.langatte') }}</a></td>
                </tr>
                <tr>
                    <td><a href="http://www.scmultifil.com/" target="_blank">Auto-Promo</a></td>
                </tr>
                </tbody>
            </table>
            <div id="map">
                <!-- Ici s'affichera la carte -->
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
<script src="js/leaflet.js"></script>
<script src="js/map.js"></script>
</html>
