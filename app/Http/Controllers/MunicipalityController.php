<?php

namespace App\Http\Controllers;

use App\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    // NON CMS
    public function show($slug)
    {   
        return view('pages.municipality', [
            'municipality' => Municipality::where('slug', $slug)->firstOrFail()
        ]);
    }

    // IN CMS
    public function index()
    {
        return view('pages.cms.municipality.index', [
            'municipalities' => Municipality::all()
        ]);
    }
    
    public function create()
    {
        return view('pages.cms.municipality.create');
    }

    public function store()
    {
        $this->validateLayer();

        $municipality = new Municipality();
        $municipality->name = request("name");
        $municipality->slug = request("slug");
        $municipality->lat = request("lat");
        $municipality->long = request("long");
        
        $municipality->save();

        return redirect()->route('cms_municipality_index');
    }

    public function destroy(Municipality $municipality)
    {
        $municipality->delete();
        return redirect()->route('cms_municipality_index');
    }

    public function edit(Municipality $municipality)
    {
        return view('pages.cms.municipality.edit', [
            'municipality' => $municipality
        ]);
    }

    public function update()
    {
        
    }

    protected function validateLayer()
    {
        return request()->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'lat' => ['numeric'],
            'long' => ['numeric']
        ]);
    }
}