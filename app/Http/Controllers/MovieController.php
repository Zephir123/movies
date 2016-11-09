<?php

namespace App\Http\Controllers;

use Input;
use Redirect;
use Request;
use Session;
use Validator;
use View;

class MovieController extends Controller
{

    /**
     * Constrctor requires user to be authenticated.
     *
     * Unathenticate users are redirected to /login.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the movies
        $movies = \App\Movie::all();

        // load the view and pass the movies
        return View::make('movies.index')
            ->with('movies', $movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/movies/create.blade.php)
        return View::make('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $rules = array(
            'title'         => 'required|max:50',
            'format'        => 'required',
            'length'        => 'required|numeric|between:0,500',
            'release_year'  => 'required|numeric|between:1800,2100',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('movies/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $movie = new \App\Movie;
            $movie->title        = Input::get('title');
            $movie->format       = Input::get('format');
            $movie->length       = Input::get('length');
            $movie->release_year = Input::get('release_year');
            $movie->rating       = Input::get('rating');
            $movie->save();

            // redirect
            Session::flash('message', 'Successfully created movie!');
            return Redirect::to('movies');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
