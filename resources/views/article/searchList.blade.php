@extends('layouts.app')

@section('content')
    <html>
    <style>
        hr{
            height:3px;
            border:none;
            border-top:3px double peru;
            width:800px;
        }
    </style>
    </html>
    @if($articles == null)
        <script> alert('没有相关文章...');window.location.href='http://localhost/why1/public/articleList';</script>
    @endif
    @foreach($articles as $article)
        <div class="" style="margin:10px 200px 1px 400px">
            <div class="row">
                <div class="col-lg-10">
                    <a href="{{url('readArticle',['id' => $article->id])}}">
                        @if($article->published == 0)
                            <h2>{{$article->name}}</h2>
                        @else
                            <h2>{{$article->name}}&nbsp;&nbsp;&nbsp;(已发布)</h2>
                        @endif
                    </a>
                    <p>{{substr(strip_tags($article->content),0,500)}}...<cite class="pull-right" style="color:rosybrown;">作者:{{\App\User::find($article->user_id)->name}}&nbsp;&nbsp;&nbsp;创建时间:{{$article->created_at}}</cite></p>
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
        </div>
        <hr/>
    @endforeach


@stop