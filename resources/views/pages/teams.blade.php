@extends('layout.default')


@section('title')
    Teams
@endsection

@section('content')
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        @foreach ($teams as $team)
            @include('components.postcard')
        @endforeach

        {{ $teams }}
    </div>
@endsection
