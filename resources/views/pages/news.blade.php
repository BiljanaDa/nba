@extends('layout.default')

@section('content')
    <main role="main" class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">News</h1>
            </div>
        </div>
        <ul>
            @foreach ($news as $novelty)
                <h2>
                    <a href="/news/{{ $novelty->id }}">
                        <li>{{ $novelty->title }}</li>
                    </a>
                </h2>
                <p class="blog-post-meta">By <a href="#"></a> on {{ $novelty->created_at }}
                </p>
                <p>{{ $novelty->content }}</p>
            @endforeach
        </ul>
        {{ $news->links() }}
    </main><!-- /.container -->
@endsection
{{-- {{ $novelty->user->name }} --}}
