<?php

namespace App\Http\Controllers\Cms;
use App\Measure;
use App\Http\Controllers\Controller;
use App\Municipality;
use Illuminate\Http\Request;

class MeasuresController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Municipality $municipality)
    {
        return view('pages.cms.measure.create', [
            'municipality' => $municipality,
        ]);
    }

    public function store()
    {
        Measure::create($this->validateMeasure());
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function destroy(Measure $measure)
    {
        $measure->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $measure->municipality_id]);
    }

    protected function validateMeasure()
    {
        return request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'municipality_id' => ['required'],
        ]);
    }

    public function edit( Measure $measure)
    {
        return view('pages.cms.measure.edit', [
            'measure' => $measure
        ]);
    }

    public function update(Measure $measure)
    {
        
        $this->validateMeasure();

        $measure->name = request("name");
        $measure->description = request("description");
        
        $measure->save();

         return redirect()->route('cms_municipality_show', ['municipality' => $measure->municipality_id]);
    }
}
