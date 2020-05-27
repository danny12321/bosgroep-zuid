<?php

namespace App\Http\Controllers;

use App\Municipality;
use App\Question;
use App\Measure;
use App\Layer;
use App\Selection;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function show($slug)
    { 
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        $filters = explode(',', request('filters'));
        return view('pages.municipality', [
            'municipality' => $municipality,
            'filters' => $filters,
            'measures' => Measure::where('municipality_id', '=', Municipality::where('slug', $slug)->firstOrFail()->id)->get(),
            'layers' => Layer::where('municipality_id', '=', Municipality::where('slug', $slug)->firstOrFail()->id)->get(),
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->get(),
        ]);
    }

    public function questionnaire($slug){
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        return view('pages.questionnaire', [
            'municipality' => $municipality
        ]);
    }
}