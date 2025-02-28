<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Layer;
use App\Municipality;
use Illuminate\Http\Request;

class LayersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Municipality $municipality)
    {
        return view('pages.cms.layers.create', [
            'municipality' => $municipality
        ]);
    }

    public function store()
    {
        $this->validateLayer();
        
        Layer::create([
            'name' => request('name'),
            'title' => request('title'),
            'municipality_id' => request('municipality_id'),
            'guidespecie_id' => request('guidespecie_id'),
            'problem_id' => request('problem_id')
        ]);
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function destroy(Municipality $municipality, Layer $layer)
    {
        $layer->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $municipality->id]);
    }

    public function edit(Municipality $municipality, Layer $layer)
    {
        return view('pages.cms.layers.edit', [
            'layer' => $layer,
            'municipality' => $municipality
        ]);
    }

    public function update(Layer $layer)
    {
        $this->validateLayer();
        
        $layer->name = request("name");
        $layer->title = request("title");
        $layer->guidespecie_id = request("guidespecie_id");
        $layer->problem_id = request("problem_id");
        
        $layer->save();
        
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    protected function validateLayer()
    {
        return request()->validate([
            'title' => ['required'],
            'name' => ['required'],
            'municipality_id' => ['required'],
        ]);
    }
}
