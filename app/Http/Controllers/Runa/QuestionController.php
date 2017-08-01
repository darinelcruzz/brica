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
