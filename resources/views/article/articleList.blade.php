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
            border-top:3px double peru;
        }
    </style>
    </html>
    @foreach($articles as $article)
        <div class="col-md-8 col-md-offset-3">
            <div class="row">
                <div class="col-lg-10">
                    <a href="{{url('readArticle',['id' => $article->id])}}">
                            @if($article->published == 0)
                        <h2>{{$article->name}}</h2>
                            @else
                        <h2>{{$article->name}}&nbsp;&nbsp;&nbsp;(已发布)</h2>
                            @endif
                    </a>
                    <p>{{substr(strip_tags($article->content),0,359)}}...<cite class="pull-right" style="color:rosybrown;">作者:{{$author}}&nbsp;&nbsp;&nbsp;&nbsp;创建时间:{{$article->created_at}}</cite></p>
                        <div class="btn-group pull-left" style="margin-top:10px;">
                            <div class="small">

                                <a href="{{url('readArticle',['id' => $article->id])}}"><button type="button" class="btn  btn-info">查看全文</button></a>

                                <a href="{{url('editArticle',['id' => $article->id])}}"><button type="button" class="btn btn-warning">修改文章</button></a>

                                <a href="{{url('publishArticle',['id' => $article->id])}}"><button type="button" class="btn btn-success">发布文章</button></a>

                                <a href="{{url('deleteArticle',['id'=> $article->id])}}"   onClick="return confirm('本操作不可恢复，确认删除？');" ><button type="button" class="btn btn-danger">删除文章</button></a>
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