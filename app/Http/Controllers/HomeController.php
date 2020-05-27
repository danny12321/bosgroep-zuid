<?php

namespace App\Http\Controllers;

use App\HomePage;
use Illuminate\Http\Request;
use App\Municipality;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $substring = explode(".", HomePage::first()->homeImage);
        $extension = $substring[1];

        return view('pages.home', [
            "HomeText" => HomePage::first()->homeText, 
            "HomeImage" => HomePage::first()->homeImage,
            "extension" => $extension,
            "municipalities" => Municipality::All()
        ]);
    }
}
