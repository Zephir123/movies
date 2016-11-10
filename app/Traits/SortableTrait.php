<?php
/**
 * Created by PhpStorm.
 * User: cbennett
 * Date: 11/10/16
 * Time: 13:15
 */
namespace App\Traits;
use Input;
use Route;
trait SortableTrait {
    public function scopeSortable($query) {
        if(Input::has('s') && Input::has('o'))
            return $query->orderBy(Input::get('s'), Input::get('o'));
        else
            return $query;
    }

    public static function link_to_sorting_action($col, $title = null) {
        if (is_null($title)) {
            $title = str_replace('_', ' ', $col);
            $title = ucfirst($title);
        }

        $indicator = (Input::get('s') == $col ? (Input::get('o') === 'asc' ? '&uarr;' : '&darr;') : null);
        $parameters = array_merge(Input::get(), array('s' => $col, 'o' => (Input::get('o') === 'asc' ? 'desc' : 'asc')));

        return link_to_route(Route::currentRouteName(), "$title $indicator", $parameters);
    }
}