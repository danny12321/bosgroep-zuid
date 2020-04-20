<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Selection;

class MapController extends Controller
{
    //
    public function index($lat, $long)
    {
        return view('pages.map', [
            'lat' => $lat,
            'long' => $long,
            'selections' => Selection::whereNull('parent_id')->get()
        ]);
    }
}
