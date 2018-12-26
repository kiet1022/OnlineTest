<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function results()
    {
        return $this->hasMany('App\TestResult','id_user','id');
    }

    public function questions()
    {
        return $this->hasMany('App\Questions','owner','id');
    }
    public function posts()
    {
        return $this->hasMany('App\Posts','id_user','id');
    }
    public function news()
    {
        return $this->hasMany('App\News','owner','id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comments','id_user','id');
    }
    public function tests()
    {
        return $this->hasMany('App\Tests','owner','id');
    }
    public function info()
    {
        return $this->hasOne('App\UserInfo','id_user','id');
    }
}
