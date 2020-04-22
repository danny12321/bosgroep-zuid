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
        
        return view('pages.map', [
            'municipality' => $municipality,
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->get()
        ]);
    }
}
