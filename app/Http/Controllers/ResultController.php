<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use Date;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $results = Result::query()
            ->where('user_id', auth()->id())
                ->with('quiz')
                    ->get();
        $data = [];
        foreach ($results as $result) {
            $questions_count = Question::query()
                ->where('quiz_id', $result->quiz_id)->count();

            $answers = Answer::query()
                ->where('result_id', $result->id)
                    ->get();

            $correctOptionsCount = Option::query()
                ->select('question_id')
                    ->where('is_correct', 1)
                        ->whereIn('id', $answers->pluck('option_id'))
                            ->count();
            $data[] = [
                'score' => (int)($correctOptionsCount/$questions_count * 100),
                'result' => $result,
                'time_taken'=>Date::createFromFormat('Y-m-d H:i:s',$result->finished_at)->diff($result->started_at),
                'status' => $result->finished_at ? ($result->finished_at <= now() ? 'Completed' : 'In Progress') : 'In Progress',

            ];
        }
        return view('dashboard.statistics', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Result $result)
    {
        $result->load('quiz.questions.options');
        $userAnswers = Answer::query()
            ->where('result_id', $result->id)
            ->pluck('option_id')
            ->toArray();

        $data=['quiz'=>$result->quiz->first()];
        $data['questions']=[];

        foreach ($result->quiz->questions as $question) {
            $questionData = [
                'question' => $question->name,
                'correct_answer' =>null,
                'user_answer' => null,
                'is_correct' => false,
            ];

            $correctOption = $question->options
                ->where('is_correct', 1)->first();

            if ($correctOption) {
                $questionData['correct_answer'] = $correctOption->name;
            }
            $userOptionId = in_array($correctOption->id, $userAnswers);
            if ($userOptionId) {
                $userOption = $question->options
                    ->find($correctOption->id)->first();
                $questionData['user_answer'] = $userOption ? $userOption->name : 'Not Answered';
                $questionData['is_correct'] = ($userOption && $userOption->is_correct);
            }else{
                $questionData['user_answer'] = 'Not Answered';
            }
            $data['questions'][] = $questionData;

        }

        return view('dashboard.result', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
