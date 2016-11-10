<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use Traits\SortableTrait;

    protected $table = 'movies';
    protected $fillable = array('title', 'format', 'length', 'release_year', 'rating');
}
