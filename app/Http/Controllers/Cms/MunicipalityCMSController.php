<?php

namespace App\Http\Controllers\Cms;

use App\GuideSpecie;
use App\Http\Controllers\Controller;
use App\Municipality;
use App\Layer;
use App\Question;
use App\Selection;
use App\Measure;
use Illuminate\Http\Request;

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
        return view('pages.cms.municipality.create');
    }

    public function store()
    {
        $this->validateLayer();
        Municipality::create([
            'name' => request("name"),
            'slug' => request("slug"),
            'lat' => request("lat"),
            'long' => request("long"),
            'zoom' => request("zoom")
        ]);

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
        $municipality->zoom = request("zoom");

        $municipality->save();

        return redirect()->route('cms_municipality_index');
    }

    protected function validateLayer()
    {
        return request()->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'lat' => ['numeric'],
            'long' => ['numeric'],
            'zoom' => ['numeric']
        ]);
    }
}
