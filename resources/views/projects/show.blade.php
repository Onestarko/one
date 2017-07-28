@extends('layouts.app')
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery.imgbox.pack.js"></script>
<link rel="stylesheet" href="lrtk.css" />
@section('content')
    <style>
        .icon-cell{
            width:4em;
        }
        .first-cell{
            padding-left:4em;
        }
    </style>
    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#toDo" aria-controls="profile" role="tab" data-toggle="tab">待完成</a></li>
            <li role="presentation"><a href="#Done" aria-controls="messages" role="tab" data-toggle="tab">已处理</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!--未完成任务列表-->
            <div role="tabpanel" class="tab-pane active" id="toDo">
                <table class="table table-striped">
                        <thead>
                        @include('tasks.createForm')
                        </thead>

                    @foreach($toDo as $task)
                  <tr>
                      <script>
                          $(function () { $(".popover-options a").popover({html : true });});
                      </script>
                        <td class="first-cell"><p class="popover-options">
                                <a type="button" class="btn btn-info" title="<h4>{{$task->title}}</h4>"
                                   data-container="body" data-toggle="popover" data-content="<img src='{{asset('taskImages/'.$task->image)}}' alt='{{$project->place}}'/> <h4>{{$task->content}}</h4>">
                                    {{$task->title}}
                                </a>
                            </td>
                        <td class="icon-cell pull-right"> @include('tasks.deleteForm')</td>
                        <td class="icon-cell pull-right"> @include('tasks.checkForm')</td>
                  </tr>
                    @endforeach
                </table>
            </div>


            <!--已处理列表-->
            <div role="tabpanel" class="tab-pane" id="Done">
                <table class="table table-striped">
                    @foreach($Done as $task)
                        <tr>
                            <td class="first-cell"><p class="popover-options">
                                    <a type="button" class="btn btn-danger" title="<h4>{{$task->title}}</h4>"
                                       data-container="body" data-toggle="popover" data-content="<img src='{{asset('taskImages/'.$task->image)}}' alt='{{$project->place}}'/> <h4>{{$task->content}}</h4>">
                                        {{$task->title}}
                                    </a>
                            </td>
                            <td class="icon-cell"> @include('tasks.deleteForm')</td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>


    </div>
@endsection