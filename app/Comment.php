<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=[
        'content','article_id','user_id'
    ];

    public function user(){
       /* 评论与用户关系:多对一*/
        return $this->belongsTo('App\User');
    }

    public function article(){
      /*  评论与文章关系:多对一*/
        return $this->belongsTo('App\Article');
    }
}
