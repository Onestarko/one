@extends('layouts.app')

@section('content')
    <!-- JiaThis Button BEGIN -->
    <script type="text/javascript" >
        var jiathis_config={
            siteNum:6,
            sm:"weixin,cqq,qzone,tsina,douban,copy",
            summary:"",
            showClose:true,
            shortUrl:false,
            hideMore:false
        }
    </script>
    <script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?type=left&btn=l.gif&move=1" charset="utf-8"></script>
    <!-- JiaThis Button END -->


    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="col-lg-8 col-lg-offset-4 text-center article-title">
                            <span >
                                <center>
                                <h1>
                                   {{-- 将文章名字删除标签后正确输出--}}
                                    {{strip_tags($article->name)}}
                                </h1>
                                    <cite>作者:{{\App\User::find($article->user_id)->name}}&nbsp;&nbsp;&nbsp;创建时间:{{$article->created_at}}</cite>
                                    <br>
                                    <cite><button class="btn btn-mini btn-success">已有评论：{{$amount}}条</button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#cm"><button class="btn btn-mini btn-info">点击查看</button></a></cite>
                                    <hr>
                                </center>
                            </span>
                            <p style="font-size:14px;" class="text2" >
                                {!!$article->content!!}
                            </p>
                        </div>
                    </div>
                </div>

                <!--评论区-->
                @if(Auth::check())
                <div style="border:5px dashed red;" class="col-lg-8 col-lg-offset-4" id="cm">
                  <center><h2>评&nbsp;&nbsp;&nbsp;论&nbsp;&nbsp;&nbsp;区</h2></center>
                    <hr>
                    <form action="{{url('comment',['id'=>$article->id])}}" method="post" class="navbar-form" >
                        {{ csrf_field() }}
                       <input type="text" class="col-lg-10" name="comment" required>
                      <button type="submit" class="btn btn-primary pull-right">发表评论</button>
                    </form>
                     <table class="table table-striped table-hover">
                         @foreach($comments as $comment)
                          <tr>
                            <td style="padding-left: 30px;">
                                {{\App\User::find($comment->user_id)->name}}:&nbsp;&nbsp;&nbsp;{{$comment->content}}
                                @if(Auth::id() == $comment->user_id)
                                    <a href="{{url('deleteComment',['id'=>$comment->id])}}"><span class="glyphicon glyphicon-remove pull-right"></span></a>
                                    @endif
                            </td>
                          </tr>
                         @endforeach
                     </table>
                 </div>
                @endif
                <hr>
            </div>
        </div>
    </div>
</div>
    @endsection