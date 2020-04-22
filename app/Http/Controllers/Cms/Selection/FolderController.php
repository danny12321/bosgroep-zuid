<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use App\Municipality;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    //

    public function create(Municipality $municipality, $selection = null)
    {
        return view('pages.cms.selection.folder.create', [
            'selection' => $selection,
            'municipality' => $municipality,
        ]);
    }

    public function store($selection = null) {
        $this->validateFolder();

        Selection::create([
            'name' => request('name'),
            'municipality_id' => request('municipality_id'),
            'parent_id'=> $selection
        ]);

        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    protected function validateFolder()
    {
        return request()->validate([
            'name' => ['required'],
            'municipality_id' => ['required'],
        ]);
    }
}
