<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Runa\RQuestion;

class QuestionController extends Controller
{
    function index()
    {
        $questions = RQuestion::all();
        $icons = $this->getIcons();
        return view('runa.questions.index', compact('questions', 'icons'));
    }

    function answer()
    {
        $questions = RQuestion::all();
        $icons = $this->getIcons();
        return view('runa.questions.survey', compact('questions', 'icons'));
    }

    function create()
    {
        return view('runa.questions.create');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'type' => 'required'
        ]);

        $question = RQuestion::create([
            'body' => $request->body,
            'type' => $request->type,
            'answers' => $this->generateAnswers($request->type)
        ]);

        return redirect('runa/preguntas');
    }

    function survey(Request $request)
    {
        foreach ($request->all() as $id => $index) {
            $question = RQuestion::find($id);
            if ($question) {
                $answers = $question->all_answers;
                $answers[$index] += 1;
                $question->update([
                    'answers' => serialize($answers)
                ]);
            }
        }

        return redirect('runa/preguntas/responder');
    }

    function edit(RQuestion $rquestion)
    {
        return view('runa.questions.edit', compact('rquestion'));
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
            'type' => 'required'
        ]);

        $question = RQuestion::find($request->id);

        $question->update([
            'body' => $request->body,
            'type' => $request->type,
            'answers' => $request->reset ? $this->generateAnswers($request->type) : $question->answers
        ]);

        return redirect('runa/preguntas');
    }

    function generateAnswers($type)
    {
        if($type) {
            return serialize(['0' => 0, '1' => 0, '2' => 0, '3' => 0, '4' => 0]);
        }

        return serialize(['0' => 0, '1' => 0]);
    }

    function getIcons()
    {
        return [
            [
                'fa fa-thumbs-o-up',
                'fa fa-thumbs-o-down'
            ],
            [
                'fa fa-heart-o',
                'fa fa-smile-o',
                'fa fa-meh-o',
                'fa fa-frown-o',
                'fa fa-thumbs-o-down'
            ]
        ];
    }
}
