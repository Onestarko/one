@extends('layouts.app')

@section('content')
    <html>
    <center>
        <form role="search" method="get" class="search-form form-inline" action="{{url('search')}}">
            <div class="form-group">
                <div class="input-append ">
                    <input type="search" class="form-control input-xxlarge" value="" name="search"  />
                    <button class="btn btn-primary" type="submit">搜索...</button>
                </div>
            </div>
        </form>
    </center>
    <style>
        hr{
            height:3px;
            border:none;
            border-top:3px double DimGray;
        }
    </style>
    </html>
    @foreach($articles as $article)
        <div class="col-md-8 col-md-offset-3">
            <div class="row">
                <div class="col-lg-10">
                    <a href="{{url('readArticle',['id' => $article->id])}}">
                        <h2>{{$article->name}}</h2>
                    </a>
                    <p>{{substr(strip_tags($article->content),0,500)}}...<cite class="pull-right" style="color:rosybrown;">作者:{{\App\User::find($article->user_id)->name}}&nbsp;&nbsp;&nbsp;&nbsp;创建时间:{{$article->created_at}}</cite></p>
                    <div class="btn-group pull-right" style="margin-top:10px;">
                        <div class="small">

                            <a href="{{url('readArticle',['id' => $article->id])}}"><button type="button" class="btn  btn-info">查看全文</button></a>

                            @if(Auth::id() == $article->user_id)
                            <a href="{{url('unPublish',['id'=> $article->id])}}"   onClick="return confirm('本操作不可恢复，确认取消发布？');" ><button type="button" class="btn btn-danger">取消发布</button></a>
                             @endif
                        </div>
                    </div>
                </div>

            </div>
            <hr class="col-md-9">
        </div>
    @endforeach


    <div class="pull-right" style="margin-right: 100px;">
        {{$articles->render()}}
    </div>
@stop