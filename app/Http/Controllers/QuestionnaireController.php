<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\MorphTo;

use App\Questionnaire;
use App\User;
use App\SurveyResponse;
use App\Answer;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'purpose' => 'required',
        ]);

        $questionnaire = Auth::user()->questionnaires()->create($data);

        return redirect('/questionnaires/' . $questionnaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses');
        return view('questionnaire.show', compact('questionnaire'));
    }
}
