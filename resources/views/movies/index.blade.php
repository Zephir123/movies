@extends('layouts.app')

@section('content')
    <div class="container">
<h1>All the Movies</h1>

<!-- Show messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Format</td>
            <td>Length</td>
            <td>Release Year</td>
            <td>Rating</td>
        </tr>
    </thead>
    <tbody>
    @foreach($movies as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->format }}</td>
            <td>{{ $value->length }}</td>
            <td>{{ $value->release_year }}</td>
            <td>{{ $value->rating }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the movie (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the movie record (uses the show method found at GET /movies/{id} -->
                <!-- a class="btn btn-small btn-success" href="{{ URL::to('movies/' . $value->id) }}">Show this Movie</a> -->

                <!-- edit this nerd (uses the edit method found at GET /moviess/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('movies/' . $value->id . '/edit') }}">Edit this Movie</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
    </div>
@endsection