<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Municipality;
use App\Question;
use App\QuestionAnswer;

class QuestionsController extends Controller
{
    //
    //
    public function create(Municipality $municipality)
    {
        return view('pages.cms.questions.create', [
            'municipality' => $municipality
        ]);
    }

    public function store(Municipality $municipality)
    {
        $answers = json_decode(request('answers'));

        $question = new Question();
        $question->question = request('question');
        $question->municipality_id = $municipality->id;

        $question->save();

        foreach ($answers as $answer) {
            $a = new QuestionAnswer();
            $a->answer = $answer->answer;
            $a->question_id = $question->id;

            $a->save();

            foreach($answer->layers as $layer) {
                $a->layers()->attach([$layer->id]);
            }
        }

        return redirect()->route('cms_municipality_show', ['municipality' => $municipality->id]);
    }
}
