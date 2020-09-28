<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $guarded = [];

    public function respondent()
    {
        return $this->belongsTo('App\Respondent', 'respondent_id');
    }

    public function checkedBy()
    {
        return $this->belongsTo('App\User', 'checked_by');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question','survey_questions')->withPivot('answer');
    }
}
