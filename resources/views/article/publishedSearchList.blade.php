@extends('layouts.app')

@section('content')
    <html>
    <style>
        hr{
            height:3px;
            border:none;
            border-top:3px double DimGray;
            width:800px;
        }
    </style>
    </html>
    @if($articles == null)
       <script> alert('没有相关文章...');window.location.href='http://localhost/why1/public/publishedArticle';</script>
        @endif
    @foreach($articles as $article)
        <div class="" style="margin:10px 200px 1px 400px">
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
        </div>
        <hr/>
    @endforeach


@stop