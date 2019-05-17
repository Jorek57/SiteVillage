@extends('template')

@section('content')
    <div class="row-justify-content-center">
        <div class="card">
            <div class="card-header">Fiche d'utilisateur</div>
            <div class="card-body">
                <p>Nom : {{ $user->name }}</p>
                <p>Email : {{ $user->email }}</p>
                @if($user->admin == 1)
                    Administrateur
                @endif
            </div>
        </div>
        <br>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
