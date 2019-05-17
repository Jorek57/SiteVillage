@extends('template')

@section('content')
    <div class="col-sm-offset-3 col-sm-12">
        <div class="card">
            <div class="card-header">Ajout d'un article</div>
            <div class="card-body">
                {!! Form::open(['route' => 'post.store', 'files' => true]) !!}
                <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                    {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                    {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                    {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Photo:') !!}
                    {!! Form::file ('image') !!}
                </div>
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
