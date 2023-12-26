@extends('layout.default')


@section('content')
    <main role="main" class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h2 class="display-4 font-italic">News: <br>{{ $novelty->title }}</h2>
            </div>
        </div>
        <div>
            <p class="blog-post-meta">By <a href="#"></a> on {{ $novelty->created_at }}</p>
            <p>{{ $novelty->content }}</p>
            <ul>
                @foreach ($novelty->teams as $team)
                    <li>
                        <a href="{{ route('news.team', ['team' => $team->name]) }}">{{ $team->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </main><!-- /.container -->
@endsection
{{-- {{ $novelty->user->name }} --}}