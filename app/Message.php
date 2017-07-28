<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model{
    protected $table = 'message';

    public $timestamps = true;

    protected function getDateFormat(){
        return time();
    }

    protected function asDateTime($val){
        return $val;
    }

    //
    protected $fillable=[
        'name','content','user_id'
    ];

    public function user(){
        /*留言与用户关系:多对一*/
        return $this->belongsTo('App\User');
    }

}