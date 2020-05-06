<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Selection;
use App\Municipality;

class MapController extends Controller
{
    public function index($slug)
    {
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        $filters= explode(',', request('filters'), -1);
        
        return view('pages.map', [
            'municipality' => $municipality,
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->get(),
            'filters' => $filters
        ]);
    }
}
