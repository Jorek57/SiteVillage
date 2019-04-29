@extends('template')

@section('content')
    <div class="col-sm-6 offset-sm-3 text-center">
        <h4>Accès à l'Administration du site</h4>
        <br>
        {!! Form::open(['url' => 'login', 'class' => 'form-horizontal justify-content-center']) !!}
        <div class="form-group">
            {!! Form::label('id', 'Identifiant : ') !!}
            {!! Form::text('id', $value = null, ['class' => 'form-control', 'type' => 'text']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Mot de Passe : ') !!}
            {!! Form::password('password',['class' => 'form-control', 'type' => 'password']) !!}
        </div>
        {!! Form::submit('Valider', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
