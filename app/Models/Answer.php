<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'result_id',
        'option_id',
        ];

//    public function result()
//    {
//        return $this->belongsTo(Result::class);
//    }
//
//    public function option()
//    {
//        return $this->belongsTo(Option::class);
//    }
}
