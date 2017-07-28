<?php
namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateTaskRequest;
use Auth;
use App\Project;
use App\Repositories\TasksRepository;
use Image;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $task;
    public function __construct(TasksRepository $task)
        //为使该控制器简洁，将任务相关逻辑放在TasksRepository，初始化引用
    {
        $this->task = $task;

        $this->middleware('auth');
    }


    public function index()
    {
       $toDo =  Auth::user()->tasks()->where('completed',0)->orderBy('created_at','ASC')->paginate(15);
       $Done = Auth::user()->tasks()->where('completed',1)->orderBy('created_at','DESC')->paginate(15);
       $projects = Project::lists('name','id');
       return view('tasks.index',compact('toDo','Done','projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        Task::create([
            'title' => $request->name,
            'project_id' => $request->project
        ]);

        return Redirect::back();
    }

    public function createTask(Request $request){
        $task = new Task();
        $task->title = $request->title;
        $task->content = $request->content;
        $task->image = $this->image($request);
        $task->project_id = $request->project_id;
        $task->save();
        return Redirect::back();
    }

    public function image($request){
        if($request->hasFile('image')) {
            $file = $request->image;
            $name = str_random(10) . '.jpg';
            $path = public_path() . '/taskImages/' . $name;
            Image::make($file)->resize(220, 150)->save($path);
            return $name;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->project_id = $request->projectList;
        $task->save();

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return Redirect::back();
    }

    public function check($id){
        $task = Task::findOrFail($id);
        $task->completed = 1;
        $task->save();
        return Redirect::back();
    }

    public function charts(){
       $total = $this->task->total();
        $toDoCount = $this->task->toDoCount();
        $doneCount = $this->task->doneCount();
        $names = Project::lists('place');
        $projects = Project::with('tasks')->get();
        return view('tasks.charts',compact('total','toDoCount','doneCount','names','projects'));

    }
}
