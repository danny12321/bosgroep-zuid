<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Layer;
use Illuminate\Http\Request;

class LayersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('pages.cms.layers.index', [
            'layers' => Layer::all()
        ]);
    }

    public function create() {
        return view('pages.cms.layers.create');
    }

    public function store() {
        Layer::create($this->validateLayer());
        return redirect()->route('cms_layers_index');
    }

    protected function validateLayer()
    {
        return request()->validate([
            'title' => ['required'],
            'name' => ['required'],
        ]);
    }
}
