<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $guarded = [];

    public function survey()
    {
        return $this->belongsTo('App\Survey', 'survey_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Answer', 'answer_id');
    }
}
