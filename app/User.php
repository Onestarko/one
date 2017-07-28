<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function project(){
     /*   用户与项目关系:一对多*/
        return $this->hasMany('App\Project');
    }

    public function tasks(){
        /*用户与任务关系：通过项目 一对多*/
        return $this->hasManyThrough('App\Task','App\Project');
    }

    public function articles(){
       /* 用户与文章关系:一对多*/
        return $this->hasMany('App\Article');
    }

    public function commend(){
      /*  用户与评论关系:一对多*/
        return $this->hasMany('App\Commend');
    }
}
