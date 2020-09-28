<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function surveys()
    {
        return $this->belongsToMany('App\Survey','survey_questions')->withPivot('answer');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User','created_by');
    }
}
