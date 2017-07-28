@extends('layouts.app')

@section('content')
    <html>
    <body>
    <style>
      /*  div{
            margin-left: auto;
            margin-right: auto;
        }*/
    </style>
    <!-- 加载编辑器的容器 -->
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="form-group has-warning col-lg-8 col-lg-offset-2">
            <label class="col-sm-4"></label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="Article[name]" placeholder="在此填写标题" required>
            </div>
            <br>
            <div style="margin-top:20px;">
                <script id="container" name="Article[content]" type="text/plain" ></script>
            </div>


        <br>
        <center><button  class="btn btn-lg btn-primary" id = "adds" type="submit"> 发布</button></center></div>
    </form>
    <!-- 配置文件 -->
    <script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->

    <script type="text/javascript">
        var ue = UE.getEditor('container',{
            initialFrameWidth:900,
            initialFrameHeight:400
        });

    </script>
    </body>
    </html>
@stop