<!--
 * Created by PhpStorm.
 * User: cbennett
 * Date: 11/8/16
 * Time: 14:20
 *
 * Basic blade template to show list of all movies
 * Will need to refactor into layout later
 -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('movies') }}">Movie List</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('movies') }}">View All Movies</a></li>
        <li><a href="{{ URL::to('movies/create') }}">Create a Movie</a>
    </ul>
</nav>

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

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('nerds/' . $value->id) }}">Show this Movie</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Movie</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
