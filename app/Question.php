<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire', 'questionnaire_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer', 'question_id');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse', 'question_id');
    }
}
