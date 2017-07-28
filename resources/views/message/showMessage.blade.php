@extends('layouts.app')

@section('content')
    <html>
    <head>
    </head>
    <body>
    <style> ul.notes li,
        ul.tag-list li {
            list-style: none;
        }
        ul.notes li h4 {
            margin-top: 20px;
            font-size: 16px;
        }
        ul.notes li div {
            text-decoration: none;
            color: #000;
            background: #ffc;
            display: block;
            height: 140px;
            width: 140px;
            padding: 1em;
            position: relative;
        }
        ul.notes li div small {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 10px;
        }
        ul.notes li div a {
            position: absolute;
            right: 10px;
            bottom: 10px;
            color: inherit;
        }
        ul.notes li {
            margin: 10px 40px 50px 0px;
            float: left;
        }
        ul.notes li div p {
            font-size: 12px;
        }
        ul.notes li div {
            text-decoration: none;
            color: #000;
            background: #ffc;
            display: block;
            height: 140px;
            width: 140px;
            padding: 1em;
            /* Firefox */
            -moz-box-shadow: 5px 5px 2px #212121;
            /* Safari+Chrome */
            -webkit-box-shadow: 5px 5px 2px rgba(33, 33, 33, 0.7);
            /* Opera */
            box-shadow: 5px 5px 2px rgba(33, 33, 33, 0.7);
        }
        ul.notes li div {
            -webkit-transform: rotate(-6deg);
            -o-transform: rotate(-6deg);
            -moz-transform: rotate(-6deg);
        }
        ul.notes li:nth-child(even) div {
            -o-transform: rotate(4deg);
            -webkit-transform: rotate(4deg);
            -moz-transform: rotate(4deg);
            position: relative;
            top: 5px;
        }
        ul.notes li:nth-child(3n) div {
            -o-transform: rotate(-3deg);
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            position: relative;
            top: -5px;
        }
        ul.notes li:nth-child(5n) div {
            -o-transform: rotate(5deg);
            -webkit-transform: rotate(5deg);
            -moz-transform: rotate(5deg);
            position: relative;
            top: -10px;
        }
        ul.notes li div:hover,
        ul.notes li div:focus {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
            position: relative;
            z-index: 5;
        }
        ul.notes li div {
            text-decoration: none;
            color: #000;
            background: #ffc;
            display: block;
            height: 210px;
            width: 210px;
            padding: 1em;
            -moz-box-shadow: 5px 5px 7px #212121;
            -webkit-box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
            box-shadow: 5px 5px 7px rgba(33, 33, 33, 0.7);
            -moz-transition: -moz-transform 0.15s linear;
            -o-transition: -o-transform 0.15s linear;
            -webkit-transition: -webkit-transform 0.15s linear;
        }
        h3{
            font-family:微软雅黑;
            font-size: 19px;
        }
    </style>


    </body>
    </html>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <ul class="notes">
                    @foreach($messages as $message)
                        <li>
                            <div style="background:rgb({{$message->color}})">
                                <h3>{{$message->content}}</h3>
                                <a>{{$message->created_at}}&nbsp;&nbsp;<i class="fa fa-paint-brush"></i>{{$message->name}}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="pull-right" style="margin-right: 120px;">
            {{$messages->render()}}
        </div>

    </div>
@stop