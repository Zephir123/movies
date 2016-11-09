@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Showing {{ $movie->title }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $movie->title }}</h2>
            <p>
                <strong>Format:</strong> {{ $movie->format }}
                <strong>Length:</strong> {{ $movie->length }}
                <strong>Release Year:</strong> {{ $movie->release_year }}
                <strong>Rating:</strong> {{ $movie->rating }}
            </p>
        </div>

@endsection