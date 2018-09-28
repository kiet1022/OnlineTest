<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table="subjects";

    public function post()
    {
    	return $this->hasMany('App\Posts','id_subject','id');
    }
}
