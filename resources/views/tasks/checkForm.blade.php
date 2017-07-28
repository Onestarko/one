
{!! Form::open(['route'=>['tasks.check',$task->id],'method'=>'POST']) !!}
    <button type="submit" class="btn btn-success btn-sm">
        <i class="fa fa-btn fa-check"></i>
    </button>
{!! Form::close() !!}