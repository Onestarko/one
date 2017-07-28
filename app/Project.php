<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=[
        'name','thumbnail'
    ];

    public function user(){
       /* 项目与用户关系:多对一*/
        return $this->belongsTo('App\User');
    }

    public function tasks(){
      /*  项目与任务关系:一对多*/
        return $this->hasMany('App\Task');
    }
}
