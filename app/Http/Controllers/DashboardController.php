<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }
    public function my_quizzes()
    {
        return view('dashboard.my-quizzes');
    }

    public function create_quiz()
    {
        return view('dashboard.create-quiz');
    }

    public function statistics()
    {
        return view('dashboard.statistics');
    }
}
