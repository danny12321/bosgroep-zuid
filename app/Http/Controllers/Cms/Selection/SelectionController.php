<?php

namespace App\Http\Controllers\Cms\Selection;

use App\Http\Controllers\Controller;
use App\Selection;
use App\Municipality;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function destroy(Municipality $municipality, Selection $selection)
    {
        $selection->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $municipality->id]);
    }
}
