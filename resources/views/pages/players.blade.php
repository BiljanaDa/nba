@extends('layout.default')

@section('content')

    <div class="blog-post">
      <h2 class="blog-post-title"><b>Player:</b> {{ $player->full_name }}</h2>
      <p class="blog-post-meta"><strong>Email: </strong><a href="mailto:{{ $player->email }}">{{ $player->email }}</a></p>
      <p class="blog-post-meta"><strong>Team:</strong> <a href="/teams/{{ $player->team->id }}">{{ $player->team->name }}</a></p>
    </div>

@endsection
