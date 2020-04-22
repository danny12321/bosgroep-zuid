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
        Layer::create($this->validateLayer());
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function destroy(Municipality $municipality, Layer $layer)
    {
        $layer->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $municipality->id]);
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
