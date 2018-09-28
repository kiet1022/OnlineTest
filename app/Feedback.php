<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table="feed_back";

    public function test()
    {
    	return $this->belongsTo('App\Tests','id_test','id');
    }
}
