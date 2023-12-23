@extends('layout.default')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title"><b>Team: </b>{{ $team->name }}</h2>
    <p class="blog-post-meta"><strong>Email: </strong><a href="mailto:{{ $team->email }}">{{ $team->email }}</a></p>
    <p class="blog-post-meta"><strong>Address:</strong> {{ $team->address }}</p>
    <p class="blog-post-meta"><strong>City:</strong> {{ $team->city }}</p>
    <p class="blog-post-meta"><strong>{{ $team->name }} players:</strong></p>
    <ul>
        @foreach ($team->players as $player)
            <li>
              <a href="/players/{{ $player->id }}">{{ $player->full_name }}</a>  
            </li>
        @endforeach
    </ul>

    <h4>Comments</h4>
    @include('components.errors')
    @include('components.status')
    @include('components.comment')
    @include('components.createcomments')
  </div>

@endsection
 