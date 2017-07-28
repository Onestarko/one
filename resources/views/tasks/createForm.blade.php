@if($errors->has('name'))
    <ul class="alert alert-danger">
        @foreach($errors->get('name') as $error)
            <li class="pull-left">{{$error}}</li>
        @endforeach
    </ul>
@endif

<td class="icon-cell">
<button type="submit" class="btn btn-success" data-toggle="modal" data-target="#TaskModal">
    <i class="fa fa-plus"></i> 添加目标任务
</button>
    <div class="modal fade" id="TaskModal" tabindex="-1" role="dialog" aria-labelledby="TaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">新增目标任务</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'createTask','method'=>'POST','files'=>'true']) !!}
                    <div class="form-group">
                        {!! Form::label('title','任务：',['class'=>'control-label']) !!}
                        {!! Form::text('title',null,['class'=>'form-control','maxlength'=>'60', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content','详情：',['class'=>'control-label']) !!}
                        {!! Form::textarea('content',null,['class'=>'form-control','size'=>'20x5','maxlength'=>'60', 'required' => 'required']) !!}
                    </div>
                    <div class="form-group">
                        {!!  Form::label('image','添加图片',['class'=>'control-label']) !!}
                        {!! Form::file('image') !!}
                        <input type="hidden" name="project_id" value="{{$project_id}}">
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('新增',['class'=>'btn btn-primary'])!!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</td>
{!! Form::close()!!}