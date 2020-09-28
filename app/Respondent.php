<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    protected $guarded = [];


    public function surveys()
    {
        return $this->hasMany('App\Survey');
    }
}
