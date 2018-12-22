<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestTopic extends Model
{
    protected $table="test_topic";

    public function test()
    {
    	return $this->hasMany('App\Tests','id_topic','id');
    }
}
