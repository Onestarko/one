<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Image;

use App\Repositories\ProjectsRepository;

use App\Http\Requests\CreateProjectRequest;

use App\Http\Requests\EditProjectRequest;
use Auth;

class ProjectController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo)

        //为使该控制器简洁，将任务相关逻辑放在ProjectRepository，初始化引用
    {
        $this->Repo = $repo;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


    public function createProject(Request $request){
        $project = new Project();
        $project->place = $request->place;
        $project->duration = $request->duration;
        $project->thumbnail = $this->thumbnail($request);
        $project->user_id = Auth::id();
        $project->save();
        return Redirect::back();

    }
    public function thumbnail($request){
        if($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $name = str_random(10) . '.jpg';
            $path = public_path() . '/thumbnails/' . $name;
            Image::make($file)->resize(261, 198)->save($path);
            return $name;
        }
    }


    public function showProject($id){
        $project = Auth::user()->project()->where('id',$id)->first();

        $toDo = $project->tasks()->where('completed',0)->orderBy('updated_at','ASC')->get();

       // $projects = Project::lists('name','id');

        $Done = $project->tasks()->where('completed',1)->get();

        $project_id = $id;

        return view('projects.show',compact('project','toDo','Done','project_id'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $project = Auth::user()->project()->where('name',$name)->first();

        $toDo = $project->tasks()->where('completed',0)->orderBy('updated_at','ASC')->get();

        $projects = Project::lists('name','id');

        $Done = $project->tasks()->where('completed',1)->get();

        return view('projects.show',compact('project','toDo','Done','projects'));
    }

   public function publishProject($id){
       $project = Project::findorFail($id);

       if($project->published == 1){

           echo "<script>alert('已经发布了呢...');window.location.href='/one/public/publishedProject'</script>";

       }else{

           $project->published = 1;

           $bool = $project->save();

           echo "<script>alert('发布成功...');window.location.href='/one/public/publishedProject'</script>";
       }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Project::find($id)->delete();
        return Redirect::back();
    }
}
