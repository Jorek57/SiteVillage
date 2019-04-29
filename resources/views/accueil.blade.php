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
    <title>Bienvenue sur le site de la Commune de Diane Capelle</title>
</head>
<body>
<div class="container">
    <div class="jumbotron text-center">
        <h1>Commune de Diane Capelle</h1>
    </div>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('/')}}'>Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('actu')}}'>Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('contact')}}'>Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url('login')}}'>Administration</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-10">
            <p>Je suis le futur accueil !</p>
        </div>
        <div class="sidenav">
            <p>Partenaires:</p>
        </div>
    </div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
</html>
