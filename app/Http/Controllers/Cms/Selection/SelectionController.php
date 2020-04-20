<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    //
    public function index()
    {
        return view('pages.cms.selection.index', [
            'selections' => Selection::whereNull('parent_id')->orderBy('layer_id')->get()
        ]);
    }

    public function destroy(Selection $selection)
    {
        $selection->delete();
        return redirect()->route('cms_selection_index');
    }
}
