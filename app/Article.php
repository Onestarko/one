<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    public $timestamps = true;

    protected function getDateFormat(){
        return time();
    }

    protected function asDateTime($val){
        return $val;
    }

    //
    protected $fillable=[
        'name','content'
    ];

    public function user(){
      /*  文章与用户关系：多对一*/
        return $this->belongsTo('App\User');
    }

    public function commend(){
    /*    文章与评论关系：一对多*/
        return $this->hasMany('App\Commend');
    }

}
