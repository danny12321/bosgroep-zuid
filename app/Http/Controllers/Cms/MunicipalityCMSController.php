<?php

namespace App\Http\Controllers\Cms;

use App\GuideSpecie;
use App\HomePage;
use App\Http\Controllers\Controller;
use App\Municipality;
use App\Layer;
use App\Question;
use App\Selection;
use App\Measure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MunicipalityCMSController extends Controller
{
    public function show(Municipality $municipality)
    {   
        return view('pages.cms.municipality.municipality', [
            'municipality' => $municipality,
            'layers' => $municipality->layers,
            'selections' => Selection::where('municipality_id', '=', $municipality->id)->whereNull('parent_id')->orderBy('layer_id')->get(),
            'questions' => $municipality->questions,
            'measures' => Measure::where('municipality_id', '=', $municipality->id)->get(),
            'guidespecies' => GuideSpecie::where('municipality_id', '=', $municipality->id)->get()
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
        return view('pages.cms.municipality.create', [
            'url_geoserver' => HomePage::First()->url_geoserver
        ]);
    }

    public function store(Request $request)
    {
        $this->validateLayer();
        $municipality = Municipality::create([
            'name' => request("name"),
            'slug' => request("slug"),
            'lat'=> request("lat"),
            'long'=> request("long")
        ]);
        
        if($request->hasFile('logo'))
        {
            $extencion = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $municipality->id . '.' . $extencion;
            $request->file('logo')->storeAs('public/assets/img/municipality', $fileNameToStore);
            $municipality->logo = "storage/assets/img/municipality/" . $fileNameToStore;
            $municipality->save();
        }
        return redirect()->route('cms_municipality_index');
    }

    public function destroy(Municipality $municipality)
    {
        Storage::delete("public". substr($municipality->logo, 7));
        $municipality->delete();
        return redirect()->route('cms_municipality_index');
    }

    public function edit(Municipality $municipality)
    {
        return view('pages.cms.municipality.edit', [
            'url_geoserver' => HomePage::First()->url_geoserver,
            'municipality' => $municipality
        ]);
    }

    public function update(Municipality $municipality, Request $request)
    {
        $this->validateLayer();

        $municipality->name = request("name");
        $municipality->slug = request("slug");
        $municipality->lat = request("lat");
        $municipality->long = request("long");
        
        
        if($request->hasFile('logo'))
        {
            $extencion = $request->file('logo')->getClientOriginalExtension();
            $fileNameToStore = $municipality->id . '.' . $extencion;
            $request->file('logo')->storeAs('public/assets/img/municipality', $fileNameToStore);
            $municipality->logo = "storage/assets/img/municipality/" . $fileNameToStore;    
        }
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