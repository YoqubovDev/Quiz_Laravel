<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.my-quizzes',[
            'quizzes'=>Quiz::withCount('questions')->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create-quiz');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'questions' => 'required|array',
           'timeLimit' => 'required|integer',
        ]);

        $quiz = Quiz::create([
            'user_id' => auth()->id(),
            'title' => $validator['title'],
            'description' => $validator['description'],
            'time_limit' => $validator['timeLimit'],
            'slug' => Str::slug(strtotime('now') .'/'. $validator['title']),
        ]);

        foreach ($validator['questions'] as $question) {
            $questionItem= $quiz->questions()->create([
                'name' => $question['quiz'],
            ]);
            foreach ($question['options'] as $optionKey=>$option) {
                $questionItem->options()->create([
                    'name' => $option,
                    'is_correct' => $option['correct'] == $optionKey ? 1 : 0,
                ]);
            }
        }
        return to_route('my-quizzes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        return view('dashboard.edit-quiz',[
            'quiz'=>$quiz
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->title = $request['title'];
        $quiz->description = $request['description'];
        $quiz->time_limit = $request['timeLimit'];
        $quiz->slug = Str::slug(strtotime('now') .'/'. $request['title']);
        $quiz->save();
        return to_route('my-quizzes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
