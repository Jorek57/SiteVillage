@extends('template')

@section('content')
    <div class="col-col-sm-6 sm-offset-3">
        <h4>Formulaire de Contact</h4>
        <br>
        {!! Form::open(['url' => 'contact']) !!}
        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
            {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Votre nom']) !!}
            {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Votre email']) !!}
            {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('texte') ? 'has-error' : '' !!}">
            {!! Form::textarea ('texte', null, ['class' => 'form-control', 'placeholder' => 'Votre message']) !!}
            {!! $errors->first('texte', '<small class="help-block">:message</small>') !!}
        </div>
        {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary float-right']) !!}
        {!! Form::close() !!}
    </div>
@endsection
