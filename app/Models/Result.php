<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'started_at',
        'finished_at',
    ];
    public $timestamps = false;

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function answers()
//    {
//        return $this->hasMany(Answer::class);
//    }
}
