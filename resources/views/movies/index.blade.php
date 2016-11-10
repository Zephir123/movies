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
                <td>{{ \App\Traits\SortableTrait::link_to_sorting_action('title') }}</td>
                <td>{{ \App\Traits\SortableTrait::link_to_sorting_action('format') }}</td>
                <td>{{ \App\Traits\SortableTrait::link_to_sorting_action('length') }}</td>
                <td>{{ \App\Traits\SortableTrait::link_to_sorting_action('release_year') }}</td>
                <td>{{ \App\Traits\SortableTrait::link_to_sorting_action('rating') }}</td>
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
                    <td>
                        {{ Form::model($value, array('route' => array('movies.update', $value->id), 'method' => 'PUT')) }}
                        <span class="star-rating" style="pointer-events: none">
                        {{ Form::radio('rating','1') }}<i></i>
                        {{ Form::radio('rating','2') }}<i></i>
                        {{ Form::radio('rating','3') }}<i></i>
                        {{ Form::radio('rating','4') }}<i></i>
                        {{ Form::radio('rating','5') }}<i></i>
                        </span>

                        {{ Form::close() }}
                    </td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>
                        <!-- edit this nerd (uses the edit method found at GET /moviess/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('movies/' . $value->id . '/edit') }}">Edit this Movie</a>

                        <!-- delete the movie (uses the destroy method DESTROY /nerds/{id} -->
                        {{ Form::open(array('url' => 'movies/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this Movie', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}

                        <!-- show the movie record (uses the show method found at GET /movies/{id} -->
                        <!-- a class="btn btn-small btn-success" href="{{ URL::to('movies/' . $value->id) }}">Show this Movie</a> -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination pull-right">{{ $movies->appends(Input::except('page'))->links() }}</div>
    </div>
@endsection