<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse', 'answer_id');
    }
}
