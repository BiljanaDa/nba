@extends('layout.default')

@section('content')
    <h1>Team</h1>

    <p>Name: {{ $team->name }}</p>
    <p>Address: {{ $team->address }}</p>
    <p>City: {{ $team->city }}</p>

    <h3>Players</h3>

    @foreach ($team->players as $player)
        <li>
            <a href="/players/{{ $player->id }}">{{ $player->full_name }}</a>
        </li>
    @endforeach
@endsection
