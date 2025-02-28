<?php

namespace App\Http\Controllers\Cms;

use App\HomePage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class HomePageCMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {   
        return view('pages.cms.home.show');
    }

    public function HomeText()
    {
        $homepage = HomePage::first();
        return view('pages.cms.home.hometext', [
            'homeText' => $homepage->homeText
        ]);
        
    }

    public function HomeImage()
    {
        $homepage = HomePage::first();
        return view('pages.cms.home.homeimage', [
            'Image' => $homepage->homeImage
        ]);
    }

    public function ImageStore(Request $request){
        if($request->hasFile('homeImage'))
        {
            $homepage = HomePage::first();
            $extencion = $request->file('homeImage')->getClientOriginalExtension();
            $homepage->homeImage = "storage/assets/img/header" . '.' . $extencion;
            $fileNameToStore = "header" . '.' . $extencion;
            $request->file('homeImage')->storeAs('public/assets/img', $fileNameToStore);
            $homepage->save();
        }
        
        return redirect()->route('cms_homepage_show');
    }

    public function HomeTextStore()
    {
        request()->validate(['homeText' => ['required']]);
        $homepage = HomePage::first();
        $homepage->homeText = request('homeText');
        $homepage->save();
        return redirect()->route('cms_homepage_show');
    }

    public function GeoServer()
    {
        $homepage = HomePage::first();
        return view('pages.cms.home.GeoServer', [
            'GeoSever' => $homepage->url_geoserver
        ]);
    }

    public function GeoServerStore()
    {
        request()->validate(['GeoSever' => ['required']]);
        $homepage = HomePage::first();
        $homepage->url_geoserver = request('GeoSever');
        $homepage->save();
        return redirect()->route('cms_homepage_show');
    }

}