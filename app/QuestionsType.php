<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsType extends Model
{
    protected $table="questions_type";

    public function questions()
    {
    	return $this->hasMany('App\Questions','id_type','id');
    }
}
