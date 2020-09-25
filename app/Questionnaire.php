<?php

namespace App;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Str;

class Questionnaire extends Model
{
    protected $table = 'questionnaires';
    protected $guarded = [];

    public function path()
    {
        return url('/questionnaires/' . $this->id);
    }

    public function publicPath()
    {
        return url('/surveys/' . $this->id . '-' . Str::slug($this->title));
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question', 'questionnaire_id');
    }

    public function surveys()
    {
        return $this->hasMany('App\Survey', 'questionnaire_id');
    }
}
