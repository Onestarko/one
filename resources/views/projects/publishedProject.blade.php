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
    <script>
        $(function () { $('#collapseThree').collapse('toggle')});
    </script>

    <center><h2>旅游指南</h2>
        <div class="panel panel-info" style="width:550px;">
            <div class="panel-heading">
                <h4 class="panel-title text-center">
                    <a data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThree">
                      点击我进行搜索
                    </a>
                </h4>
            </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <div style="border:2px dashed forestgreen; width:520px; padding:10px;">
                    <div>
                        <div style="overflow: hidden; left: 323px; top: 90.5px; display: none;" id="form_cities">
                            <div id="top_cities">简码/汉字或↑↓</div>
                            <div id="panel_cities"></div>
                            <div style="display: block;" id="flip_cities">
                                «&nbsp;向前&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="cityflip" onclick="city_showlist(1);return false;">向后&nbsp;»</a>
                            </div>
                        </div>
                    </div>

                    <div style="top:0;left:0;z-index:1000;POSITION: absolute;">
                        <div style="overflow: hidden; display: none; left: 323px; top: 90.5px;" id="form_cities2">
                            <div id="top_cities1"> </div>
                            <div id="panel_cities2"></div>
                        </div>
                    </div>
                    <table class="cx_from" border="0" cellpadding="0" cellspacing="0" width="600">
                        <tbody>
                        <tr>
                            {!! Form::open(['url'=>'searchProject','method'=>'POST','files'=>'true']) !!}
                            {!! Form::label('place','城市选择：',['class'=>'control-label']) !!}
                            {!! Form::text('place',null,['class'=>'form-control span5','id'=>'toStationText','value'=>'简码/汉字']) !!}
                        </tr>
                        <tr>
                            {!! Form::label('duration','时长选择：',['class'=>'control-label']) !!}
                            <td> {{ Form::radio('duration', '一日', true) }}一日游<br></td>
                            <td>  {{ Form::radio('duration', '二日') }}两日游<br></td>
                            <td> {{ Form::radio('duration', '三日') }}三日游<br></td>
                        </tr>
                        <tr>
                            <td> {{ Form::radio('duration', '七日游') }}一星期<br></td>
                            <td> {{ Form::radio('duration', '半月') }}半月游<br></td>
                            <td> {{ Form::radio('duration', '一月以上') }}一个月及以上<br></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="col-sm-offset-5">
                        {!! Form::submit('搜索',['class'=>'btn btn-primary'])!!}

                        {!! Form::close() !!}
                    </div>
                </div></center>
            </div>
        </div>

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
                                      <center><h5>{{\App\User::find($project->user_id)->name}}&nbsp;&nbsp;&nbsp;</h5></center>
                                    </li>
                                    <li class="pro">
                                        <center><h5>{{$project->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></center>
                                    </li>

                                </ul>

                                <a href="{{url('showPublishedProject',$project->id)}}">
                                    <img src="{{asset('thumbnails/'.$project->thumbnail)}}" alt="{{$project->place}}">
                                </a>
                                <div class="caption">
                                    <a href="{{url('showPublishedProject',$project->id)}}">
                                        <h4 class="text-center">{{$project->place}}&nbsp;&nbsp;{{$project->duration}}游 @if($project->published == 1)@endif</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

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