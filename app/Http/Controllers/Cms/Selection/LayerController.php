<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use App\Layer;
use Illuminate\Http\Request;

class LayerController extends Controller
{
    //
    public function create($selection = null)
    {
        return view('pages.cms.selection.layer.create', [
            'selection' => $selection,
            'layers' => Layer::all()
        ]);
    }

    public function store($selection = null) {
        $this->validateFolder();

        Selection::create([
            'layer_id' => request('layer'),
            'parent_id'=> $selection
        ]);

        return redirect()->route('cms_selection_index');
    }

    protected function validateFolder()
    {
        return request()->validate([
            'layer' => ['required'],
        ]);
    }
}
