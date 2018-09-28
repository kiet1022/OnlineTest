<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table="posts";

    public function user()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
    public function subject()
    {
    	return $this->belongsTo('App\Subjects','id_subject','id');
    }
}
