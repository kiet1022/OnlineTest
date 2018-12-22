<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table="test_result";

    public function test()
    {
    	return $this->belongsTo('App\Tests','id_test','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
