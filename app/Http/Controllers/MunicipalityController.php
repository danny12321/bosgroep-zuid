<?php

namespace App\Http\Controllers;

use App\Municipality;
use App\Question;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function show($slug)
    { 
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
            return view('pages.municipality', [
                'municipality' => $municipality
            ]);
    }

    public function questionnaire($slug){
        $municipality = Municipality::where('slug', $slug)->firstOrFail();
        return view('pages.questionnaire', [
            'municipality' => $municipality
        ]);
    }
}