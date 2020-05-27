<?php

namespace App\Http\Controllers\Cms;

use App\Measure;
use App\Http\Controllers\Controller;
use App\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeasuresController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Municipality $municipality)
    {
        return view('pages.cms.measure.create', [
            'municipality' => $municipality,
        ]);
    }

    public function store(Request $request)
    {
        $this->validateMeasure();

        $fileNameToStore = null;
        
        // Safe pdf
        if($request->hasFile('pdf')) {
            $filenameWithExt = $request->file('pdf')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extencion = $request->file('pdf')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extencion;
            $path = $request->file('pdf')->storeAs('public/maatregelen', $fileNameToStore);
        }

        $measure = Measure::create([
            'name' => request('name'),
            'description' => request('description'),
            'municipality_id' => request('municipality_id'),
            'pdf_path' => $fileNameToStore,
            'guidespecie_id' => request('guidespecie_id'),
            'problem_id' => request('problem_id'),
        ]);

        return redirect()->route('cms_municipality_show', ['municipality' => request("municipality_id")]);
    }

    public function destroy(Measure $measure)
    {
        // Delete pdf
        if (Storage::exists('public/maatregelen/'.$measure->pdf_path)) {
            Storage::delete('public/maatregelen/'.$measure->pdf_path);
        }

        $measure->delete();
        return redirect()->route('cms_municipality_show', ['municipality' => $measure->municipality_id]);
    }

    protected function validateMeasure()
    {
        return request()->validate([
            'name' => ['required'],
            'description' => ['required'],
            'municipality_id' => ['nullable'],
            'pdf' => ['nullable', 'mimes:pdf', 'max:10000'],
        ]);
    }

    public function edit(Measure $measure)
    {
        return view('pages.cms.measure.edit', [
            'measure' => $measure,
            'municipality' => Municipality::where('id', '=', $measure->municipality_id)->get()->first()
        ]);
    }

    public function update(Request $request, Measure $measure)
    {
        $this->validateMeasure();

        $measure->name = request("name");
        $measure->description = request("description");
        $measure->guidespecie_id = request("guidespecie_id");
        $measure->problem_id = request("problem_id");

        // Safe pdf
        if($request->hasFile('pdf')) {
            // Delete old pdf
            if (Storage::exists('public/maatregelen/'.$measure->pdf_path)) {
                Storage::delete('public/maatregelen/'.$measure->pdf_path);
            }

            $filenameWithExt = $request->file('pdf')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extencion = $request->file('pdf')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extencion;
            $path = $request->file('pdf')->storeAs('public/maatregelen', $fileNameToStore);

            $measure->pdf_path = $fileNameToStore;
        }
        
        $measure->save();

        return redirect()->route('cms_municipality_show', ['municipality' => $measure->municipality_id]);
    }
}
