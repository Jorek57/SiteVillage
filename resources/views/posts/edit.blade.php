@extends('template')

@section('content')
    <div class="col-sm-offset-3 col-sm-12">
        <div class="card">
            <div class="card-header">Modification d'un article</div>
            <div class="card-body">
                {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel', 'files' => true]) !!}
                <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                    {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                    {!! $errors->first('titre', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('contenu') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('contenu', null, ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}
                    {!! $errors->first('contenu', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Nouvelle Photo:') !!}
                    {!! Form::file ('image') !!}
                </div>
                {!! Form::submit('Valider la Modification', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <br>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection
