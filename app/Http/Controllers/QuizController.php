<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function take_quiz()
    {
        return view('take-quiz.take-quiz');
    }
}
