<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //对任务列表展示之前确保是用户登录状态
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $projects = Auth::user()->project()->orderBy('created_at','ASC')->get();
        return view('welcome',compact('projects'));
    }
}
