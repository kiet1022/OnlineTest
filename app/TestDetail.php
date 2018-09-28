<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestDetail extends Model
{
    protected $table="test_detail";

    public function test()
    {
    	return $this->belongsTo('App\Test','id_test','id');
    }
    public function question()
    {
    	return $this->belongsTo('App\Questions','id_question','id');
    }
}
