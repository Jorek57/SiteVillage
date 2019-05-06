@extends('template')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription à la lettre d'information</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'storeEmail']) !!}
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Entrez votre email')) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>
                    {!! Form::submit('Envoyer !', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
