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

        $antwoord = request('vraag1');

        if (!array_key_exists($city,$cities)){
            abort(404,'Not Found');
        }

        return view('pages.city',[
            'city' => $cities[$city],
            'antwoord'=> $antwoord
        ]);
    }

    public function showForm($city){  

        $cityName = $city;
        $cities = [
            'denhaag' => 'Welkom bij Gemeente Den Haag',
            'tilburg' => 'Welkom bij Gemeente Tilburg',
            'weert' => 'Welkom bij Gemeente Weert',
            'horst' => 'Welkom bij Gemeente Horst'
        ];

        $answers = [
            'Question1' => 'Unanswered',
            'Question2' => 'Unanswered',
            'Question3' => 'Unanswered'
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