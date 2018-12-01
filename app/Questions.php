<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table="questions";

    public function user()
    {
    	return $this->belongsTo('App\User','owner','id');
    }

    public function type(){
    	return $this->belongsTo('App\QuestionsType','id_type','id');
    }
}
