<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    //

    public function create($selection = null)
    {
        return view('pages.cms.selection.folder.create', ['selection' => $selection]);
    }

    public function store($selection = null) {
        $this->validateFolder();

        Selection::create([
            'name' => request('name'),
            'parent_id'=> $selection
        ]);

        return redirect()->route('cms_selection_index');
    }

    protected function validateFolder()
    {
        return request()->validate([
            'name' => ['required'],
        ]);
    }
}
