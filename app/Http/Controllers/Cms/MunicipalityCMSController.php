<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Municipality;
use App\Layer;
use App\Selection;
use Illuminate\Http\Request;

class MunicipalityCMSController extends Controller
{
    public function show(Municipality $municipality)
    {   
        return view('pages.cms.municipality.municipality', [
            'municipality' => $municipality,
            'layers' => Layer::where('municipality_id', '=', $municipality->id)->get(),
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->orderBy('layer_id')->get()
        ]);
    }

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

    public function update(Municipality $municipality)
    {
        $this->validateLayer();

        $municipality->name = request("name");
        $municipality->slug = request("slug");
        $municipality->lat = request("lat");
        $municipality->long = request("long");
        
        $municipality->save();

        return redirect()->route('cms_municipality_index');
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