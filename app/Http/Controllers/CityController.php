<?php

namespace App\Http\Controllers;

class CityController extends Controller
{
    

    public function show($city)
    {
        request()->validate([
            'vraag1' => ['required'],
            'vraag2' => ['required']
        ]);
        
        $cities = [
            'denhaag' => 'Welkom bij Gemeente Den Haag',
            'tilburg' => 'Welkom bij Gemeente Tilburg',
            'weert' => 'Welkom bij Gemeente Weert',
            'horst' => 'Welkom bij Gemeente Horst'
        ];

        $answers = [
            'vraag1' => request('vraag1'),
            'vraag2' => request('vraag2')
        ];

        if (!array_key_exists($city,$cities)){
            abort(404,'Not Found');
        }

        return view('pages.city',[
            'city' => $cities[$city],
            'answers' => $answers
        ]);
    }

    public function showForm($city){  

        $cityName = $city;

        //Kan dit niet beter?
        $cities = [
            'denhaag' => 'Welkom bij Gemeente Den Haag',
            'tilburg' => 'Welkom bij Gemeente Tilburg',
            'weert' => 'Welkom bij Gemeente Weert',
            'horst' => 'Welkom bij Gemeente Horst'
        ];

        if (!array_key_exists($city,$cities)){
            abort(404,'Not Found');
        }

        return view('pages.form',[
            'city' => $cities[$city],
            'cityname' => $cityName
        ]);
    }
}