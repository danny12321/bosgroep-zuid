<?php

namespace App\Http\Controllers;

use App\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function show($slug)
    {   
        return view('pages.municipality', [
            'municipality' => Municipality::where('slug', $slug)->firstOrFail()
        ]);
    }
}