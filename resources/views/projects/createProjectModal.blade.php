<!-- Button trigger modal -->
<style>
    .modal-trigger{
        display:block;
        font-size:3em;
        margin-left:auto;
        margin-right:auto;
        margin-top:42px;
        border:0;
    }

    i{
        margin-right: 0;
    }
</style>
<button class="btn btn-default modal-trigger" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-btn fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新建项目</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'createProject','method'=>'POST','files'=>'true']) !!}


                <div style="top:0;left:0;z-index:1000;POSITION: absolute;">
                    <div style="overflow: hidden; display: none; left: 323px; top: 90.5px;" id="form_cities2">
                        <div id="top_cities1"> </div>
                        <div id="panel_cities2"></div>
                    </div>
                </div>
                <table class="cx_from" border="0" cellpadding="0" cellspacing="0" width="600">
                    <tbody>
                    <tr>
                        {!! Form::label('place','城市选择：',['class'=>'control-label']) !!}
                        {!! Form::text('place',null,['class'=>'form-control','id'=>'toStationText','value'=>'简码/汉字']) !!}
                    </tr>
                    <tr>
                        {!! Form::label('duration','时长选择：',['class'=>'control-label']) !!}
                        <br>
                         <td> {{ Form::radio('duration', '一日', true) }}一日游<br></td>
                         <td>  {{ Form::radio('duration', '二日') }}两日游<br></td>
                         <td> {{ Form::radio('duration', '三日') }}三日游<br></td>
                    </tr>
                    <tr>
                        <td> {{ Form::radio('duration', '七日') }}一星期<br></td>
                        <td> {{ Form::radio('duration', '半月') }}半月游<br></td>
                        <td> {{ Form::radio('duration', '一月以上') }}一个月及以上<br></td>
                    </tr>
                    </tbody>
                </table>


                    <div class="form-group">
                    {!!  Form::label('thumbnail','项目缩略图',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail') !!}
                </div>


            </div>
            <div class="modal-footer">
                {!! Form::submit('新建项目',['class'=>'btn btn-primary'])!!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>