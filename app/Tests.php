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
    	return $this->hasMany('App\TestResult','id_test','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','owner','id');
    }

    public function topic(){
        return $this->belongsTo('App\TestTopic','id_topic','id');
    }
}
