<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table="news";

    public function user()
    {
    	return $this->belongsTo('App\User','owner','id');
    }
    public function newstype()
    {
    	return $this->belongsTo('App\NewsType','id_type','id');
    }
}
