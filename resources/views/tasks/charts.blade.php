<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Onestarko</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="station.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Onestarko
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    <a  href="{{url('task_all')}}">我的旅游列表</a>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">我的游记</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('articleList')}}">查看游记</a>
                        </li>
                        <li>
                            <a href="{{url('writeArticle')}}">写游记</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a  href="{{url('publishedProject')}}">旅游指南</a>
                </li>

                <li><a href="{{url('publishedArticle')}}">共享游记</a></li>

                <li><a href="{{url('music')}}">本周音乐</a></li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">留言板</a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('message')}}">查看留言</a>
                        </li>
                        <li>
                            <a><a data-toggle="modal" data-target="#messageModal">写留言</a></a>

                        </li>
                    </ul>
                </li>
            </ul>
            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">留言板</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url'=>'createMessage','method'=>'POST','files'=>'true']) !!}
                            <div class="form-group">
                                {!! Form::label('newMessage','留言内容：',['class'=>'control-label']) !!}
                                {!! Form::textarea('newMessage',null,['class'=>'form-control','size'=>'20x5','maxlength'=>'60', 'required' => 'required']) !!}
                            </div>

                            <div class="form-group">

                                {!!  Form::label('name','署名：',['class'=>'control-label']) !!}
                                {!! Form::text('name',null,['class'=>'form-control', 'required' => 'required']) !!}
                            </div>


                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('新增留言',['class'=>'btn btn-primary'])!!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>退出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<div class="col-sm-11 col-sm-offset-2">
    <div class="container col-md-4">
        <canvas id="pieChart" width="'300" height="300"></canvas>
    </div>

    <div class="container col-md-4">
        <canvas id="RadarChart" width="'300" height="300"></canvas>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}





    <script src="//cdn.bootcss.com/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
        $(document).ready(function(){
            var ctxPie = $('#pieChart');
            var data = {
                labels:[
                    '未完成',
                    '已完成',
                ],
                datasets:[
                    {
                        data:[{{$toDoCount}},{{$doneCount}}],
                        backgroundColor:[
                            '#FF6384',
                            '#36A2EB',
                        ],
                        hoverBackgroundColor:[
                            '#FF6384',
                            '#36A2EB',
                        ]
                    }]
            };


            var myPieChart = new Chart(ctxPie,{

                type:'pie',
                data:data,
                options:{
                    responsive:true,
                    title:{
                        display:true,
                        text:'所有任务的完成比例（总数：{{$total}}）'
                    }
                }
            });


        });




        var ctxRadar = $('#RadarChart');
        var dataRadar = {
            labels: ["任务总数", "已完成", "待完成"],
            datasets: [
                <?php
                    $i = 0;
                    foreach($projects as $project):
                    $name = $project->place;
                    $totalPP = $project->tasks()->count();
                    $todoPP = $project->tasks()->where('completed', 0)->count();
                    $donePP = $project->tasks()->where('completed', 1)->count();
                    echo '{';
                    ?>

                    label:"<?php echo $name ?>",
            backgroundColor:"{{rand_color()}}",
            borderColor:"{{rand_color()}}",
            pointBackgroundColor:"{{rand_color()}}",
            pointBorderColor:"#fff",
            pointHoverBackgroundColor:"#fff",
            pointHoverBorderColor:"rgba(179,181,198,1)",
            data:[ <?php echo $totalPP . ',' . $donePP . ',' . $todoPP ?>]

        <?php
        ($i + 1) == $projects->count() ? print '}' : print'},';
        $i++;
        endforeach;
        ?>
        ]
        };
        var myRadarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: dataRadar,
            options:{
                responsive:true,
                title:{
                    display:true,
                    text:'项目之间的任务完成情况'
                },
                legend:{
                    display:true,
                    position:"bottom"
                }
            }
        });
    </script>

