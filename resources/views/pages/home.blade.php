@extends('layout.default')


@section('title')
    Home
@endsection


@section('content')
    <div class="container my-5">
        <div class="position-relative p-5 text-center text-muted bg-body border border-dashed rounded-5">
            <button type="button"
                class="position-absolute top-0 end-0 p-3 m-3 btn-close bg-secondary bg-opacity-10 rounded-pill"
                aria-label="Close"></button>
            <svg class="bi mt-5 mb-3" width="48" height="48">
                <use xlink:href="#check2-circle" />
            </svg>
            <h1 class="text-body-emphasis">Welcome to my NBA blog</h1>
           <br>
            <a href="/teams" class="btn btn-primary px-5 mb-5" type="button">
                Go to teams
            </a>
        </div>
    </div>
@endsection
