<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $table="tests";

    public function feedback()
    {
    	return $this->hasMany('App\Feedback','id_test','id');
    }

    public function detail()
    {
    	return $this->hasMany('App\TestDetail','id_test','id');
    }

    public function result()
    {
    	return $this->hasMany('App\TestReult','id_test','id');
    }
}
