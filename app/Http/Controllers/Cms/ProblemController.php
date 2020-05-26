<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Problem;
use App\Municipality;
use Illuminate\Http\Request;

class ProblemController extends Controller

{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Municipality $municipality)
    {
        return view('pages.cms.problem.create', [
            'municipality' => $municipality
        ]);
    }

    public function store()
    {        
        Problem::create($this->validateProblem());
        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function edit(Problem $problem)
    {
        return view('pages.cms.problem.edit', [
            'problem' => $problem
        ]);
    }

    public function update(Problem $problem)
    {
        $this->validateProblem();
        $problem->name = request("name");
        $problem->save();

        return redirect()->route('cms_municipality_show', ['municipality' => $problem->municipality_id]);
    }

    public function destroy(Problem $problem)
    {
        $problem->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $problem->municipality_id]);
    }

    protected function validateProblem()
    {
        return request()->validate([
            'name' => ['required'],
            'municipality_id' => ['required']
        ]);
    }
}