<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use  Illuminate\Support\Facades\DB;

class MessageController extends Controller{
    public function showMessage(){

        //设置留言每页显示10条数据

        $messages = Message::orderBy('created_at','DESC')->paginate(10);

        return view('message.showMessage',[
            'messages' => $messages,
        ]);
    }

    public function createMessage(Request $request){
        $messages = new Message();

        if($request->isMethod('POST')){

            //设置留言随机背景颜色

            $color = rand(0,255).','.rand(0,255).','.rand(0,255);

            $user_id = Auth::id();

            $bool = DB::insert('insert into message (name,content,user_id,color) values(?,?,?,?)',[

                $request->name,
                $request->newMessage,
                $user_id,
                $color

            ]);

            if($bool){
                echo "<script> alert('新建成功!'); window.location.href='/one/public/message' </script>";
            }else{
                return redirect()->back();
            }
        }
    }
}