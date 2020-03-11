<?php

namespace App\Http\Controllers;

class CityController extends Controller
{
    public function show($city)
    {
        $cities = [
            'denhaag' => 'Welkom bij Gemeente Den Haag',
            'tilburg' => 'Welkom bij Gemeente Tilburg',
            'weert' => 'Welkom bij Gemeente Weert',
            'horst' => 'Welkom bij Gemeente Horst'
        ];

        if (!array_key_exists($city,$cities)){
            abort(404,'Not Found');
        }

        return view('pages.city',[
            'city' => $cities[$city]
        ]);
    }
}