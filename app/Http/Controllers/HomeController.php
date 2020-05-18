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
        return view('pages.home', [
            "HomeText" => HomePage::first()->homeText, 
            "municipalities" => Municipality::All()
        ]);
    }
}
