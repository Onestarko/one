@extends('layouts.app')

@section('content')
    <style>
        .thumbnail{
            padding:0;
        }
        .thumbnail.caption{
            padding:0;
        }
        a{
            color:black;
        }

        .icon-bar{
            width:90%;
            background-color: #dff0d8;
            opacity: 0.7;
            list-style:none;
            z-index: 100;
            position:absolute;
            top:0;
        }

        .but{
            background:transparent;
            border:none;
            border-radius:0;
            padding:0;
        }

        .pro{
            float: right;
            margin-right:0;
        }

       .project-modal{
            background-color:#fff;
            border:1px dotted #ddd;
            border-radius:4px;
            display: block;
            width:268px;
            height:184px;
            line-height:1.42857;
            margin-top:30px;
            margin-bottom:20px;
            padding:4px;
            transition:bordeer 0.2s ease-in-out 0s;
        }




    </style>

    <center><h2>旅游列表</h2><a href="{{url('charts')}}"><button class="btn btn-info btn-xs">查看目标统计</button></a></center>

<div class="container">

    <hr>
    <div class="row">
        <div class="row">
            @if($projects)
                @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">

                            <ul class="icon-bar">
                                <li class="pro">
                                    @include('projects.delectForm')
                                </li>
                                <li class="pro">
                                    <a href="{{url('publishProject',['id'=>$project->id])}}"><button type="button" class="btn">
                                        <i class="glyphicon glyphicon-send"></i>
                                    </button>
                                    </a>
                                </li>

                            </ul>

                            <a href="{{url('showProject',$project->id)}}">
                            <img src="{{asset('thumbnails/'.$project->thumbnail)}}" alt="{{$project->place}}">
                            </a>
                            <div class="caption">
                                <a href="{{url('showProject',$project->id)}}">
                                    <h4 class="text-center">{{$project->place}}&nbsp;&nbsp;{{$project->duration}}游 @if($project->published==1) &nbsp;&nbsp;(已发布)@endif</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif <div class="project-modal col-sm-6 col-md-3">
                @include('projects/createProjectModal')
            </div>

        </div>


    </div>
</div>


@endsection

@section('customJS')
    <script>
        $(document).ready(function(){
            $('.icon-bar').hide();
            $('.thumbnail').hover(function() {
                $(this).find('.icon-bar').toggle();
            });
        });
    </script>
@endsection