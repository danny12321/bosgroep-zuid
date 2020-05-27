<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use App\Selection;
use App\Layer;
use App\Measure;
use App\Municipality;

class MapController extends Controller
{
    public function index($slug)
    {
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        $measures = Measure::where('municipality_id', '=', Municipality::where('slug', $slug)->firstOrFail()->id)->get();
        $filters = explode('-', request('filters'));


        return view('pages.map', [
            'municipality' => $municipality,
            'measures' => $measures,
            'layers' => Layer::where('municipality_id', '=', Municipality::where('slug', $slug)->firstOrFail()->id)->get(),
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->get(),
            'filters' => $filters,
            'url_geoserver' => HomePage::First()->url_geoserver
        ]);
    }
}
