<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $guarded = [];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire', 'questionnaire_id');
    }

    public function responses()
    {
        return $this->hasMany('App\SurveyResponse', 'survey_id');
    }
}
