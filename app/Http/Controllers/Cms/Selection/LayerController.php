<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use App\Municipality;
use App\Layer;

use Illuminate\Http\Request;

class LayerController extends Controller
{
    //
    public function create(Municipality $municipality, $selection = null)
    {
        return view('pages.cms.selection.layer.create', [
            'selection' => $selection,
            'layers' => Layer::where('municipality_id', '=', $municipality->id)->get(),
            'municipality' => $municipality,
        ]);
    }

    public function store($selection = null) {
        $this->validateFolder();

        Selection::create([
            'layer_id' => request('layer'),
            'municipality_id' => request('municipality_id'),
            'parent_id'=> $selection
        ]);

        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    protected function validateFolder()
    {
        return request()->validate([
            'layer' => ['required'],
        ]);
    }
}
