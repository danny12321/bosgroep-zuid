<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use App\Selection;
use App\Municipality;

class MapController extends Controller
{
    public function index($slug)
    {
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        $filters = explode('-', request('filters'));


        return view('pages.map', [
            'municipality' => $municipality,
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->get(),
            'filters' => $filters,
            'url_geoserver' => HomePage::First()->url_geoserver
        ]);
    }
}
