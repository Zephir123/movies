@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Movie</h1>

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::open(array('url' => 'movies')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('format', 'Format') }}
            {{ Form::select('format', array(null => 'Select a Format', 'VHS' => 'VHS', 'DVD' => 'DVD', 'Streaming' => 'Streaming'), Input::old('format'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('length', 'Length') }}
            {{ Form::number('length', Input::old('length'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('release_year', 'Release Year') }}
            {{ Form::number('release_year', Input::old('release_year'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('rating', 'Rating') }}
            <div class="form-control">
                <span class="star-rating">
                    {{ Form::radio('rating','1', Input::old('rating')) }}<i></i>
                    {{ Form::radio('rating','2', Input::old('rating')) }}<i></i>
                    {{ Form::radio('rating','3', Input::old('rating')) }}<i></i>
                    {{ Form::radio('rating','4', Input::old('rating')) }}<i></i>
                    {{ Form::radio('rating','5', Input::old('rating')) }}<i></i>
                </span>
            </div>
        </div>

    {{ Form::submit('Add the Movie!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection