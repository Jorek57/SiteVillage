@extends('template')

@section('content')
    @if(Auth::check())
        <div class="text-center">
            {!! link_to_route('post.create', 'Créer un article', [], ['class' => 'btn btn-primary']) !!}
        </div>
    <p></p>
    @endif
    {!! $links !!}
    @foreach($posts as $post)
        <article class="row">
            <div class="col-12">
                <header>
                    <h1>{{ $post->titre }}</h1>
                </header>
                <hr>
                <section>
                    @if ($post->image && File::exists(public_path("uploads/" . $post->image)))
                    <img class="img-fluid" src="{{ asset('uploads/' . $post->image) }}">
                    @endif
                    <br>
                    <p>{{substr(strip_tags($post->contenu),0, 280) }}{{ strlen(strip_tags($post->contenu)) > 300 ? "..." : "" }}</p>

                    <div class="float-right">
                        <span class="glyphicon glyphicon-pencil"></span> {{ $post->user->name }} le {!! $post->created_at->format('d-m-Y') !!}
                    </div>
                </section>
            </div>
            <tbody>
            <tr>
                <td>{!! link_to_route('post.show', 'Lire la suite', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}</td>
            </tr>
            </tbody>
            @if(Auth::check() and Auth::user()->admin)
                <table class="table">
                    <tbody>
                    <tr>
                        <td>{!! link_to_route('post.edit', 'Modifier cet article', [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post->id]]) !!}
                            {!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-block ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </article>
        <br>
    @endforeach
    {!! $links !!}
@endsection
