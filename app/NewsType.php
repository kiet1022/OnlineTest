<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    protected $table="news_type";

    public function news()
    {
    	return $this->hasMany('App\News','id_type','id');
    }
}
