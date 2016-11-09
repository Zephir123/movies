@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Edit {{ $movie->title }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($movie, array('route' => array('movies.update', $movie->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('format', 'Format') }}
        {{ Form::select('format', array(null => 'Select a Format', 'VHS' => 'VHS', 'DVD' => 'DVD', 'Streaming' => 'Streaming'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('length', 'Length') }}
        {{ Form::number('length', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('release_year', 'Release Year') }}
        {{ Form::number('release_year', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rating', 'Rating') }}
        <div class="form-control">
                <span class="star-rating">
                    {{ Form::radio('rating','1') }}<i></i>
                    {{ Form::radio('rating','2') }}<i></i>
                    {{ Form::radio('rating','3') }}<i></i>
                    {{ Form::radio('rating','4') }}<i></i>
                    {{ Form::radio('rating','5') }}<i></i>
                </span>
        </div>
    </div>

    {{ Form::submit('Edit the MOVIE!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

@endsection