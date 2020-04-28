<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\GuideSpecie;
use App\Municipality;
use Illuminate\Http\Request;

class GuideSpeciesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Municipality $municipality)
    {
        return view('pages.cms.guidespecies.create', [
            'municipality' => $municipality
        ]);
    }

    public function store()
    {
        GuideSpecie::create($this->validateSpecie());
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function destroy(Municipality $municipality, GuideSpecie $guideSpecie)
    {
        $guideSpecie->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $municipality->id]);
    }

    protected function validateSpecie()
    {
        return request()->validate([
            'name' => ['required'],
            'municipality_id' => ['required'],
        ]);
    }
}
