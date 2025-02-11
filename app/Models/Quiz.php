<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use mysql_xdevapi\Result;
use Symfony\Component\Console\Question\Question;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'slug',
        'time_limit',
        'user_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
