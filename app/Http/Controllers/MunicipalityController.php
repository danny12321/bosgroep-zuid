<?php

namespace App\Http\Controllers;

use App\Municipality;
use App\Measure;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function show($slug)
    {   
        return view('pages.municipality', [
            'municipality' => Municipality::where('slug', $slug)->firstOrFail(),
            'measures' => Measure::where('municipality_id', '=', Municipality::where('slug', $slug)->firstOrFail()->id)->get(),
        ]);
    }
}