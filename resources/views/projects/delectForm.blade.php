{!!Form::open(['route'=>['projects.destroy',$project->id],'method'=>'DELETE']) !!}
<button type="submit" class="btn">
    <i class="fa fa-btn fa-close"></i>
</button>
{!! Form::close() !!}