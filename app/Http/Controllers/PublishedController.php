<?php

/*此部分内容不需要用户登录即可进行操作
  所以将部分方法单独controller
  不放在ArticleController*/

namespace App\Http\Controllers;
use App\Article;
use App\Comment;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublishedController extends Controller{

    public function publishedArticle(){
        $articles = Article::where('published',1)->orderBy('created_at','DESC')->paginate(10);

        return view('article.publishedArticle',[
            'articles' => $articles
        ]);
    }

    public function readArticle($id){

        $article = Article::find($id);

        $comments = Comment::where('article_id',$id)->orderBy('created_at','DESC')->get();

        $amount = Comment::where('article_id',$id)->count();

        return view('article/readArticle',[
            'article' => $article,
            'comments' => $comments,
            'amount' => $amount,
        ]);
    }

    public function publishedProject(){
        $projects = Project::where('published',1)->orderBy('created_at','DESC')->paginate(10);
        return view('projects.publishedProject', [
            'projects' => $projects
        ]);
    }

    public function showPublishedProject($id){
        $project = Project::findorFail($id);
        $tasks = $project->tasks()->orderBy('updated_at','ASC')->get();
        return view('projects.showPublishedProject',[
            'tasks' => $tasks,
            'project' => $project
        ]);
    }

    public function searchProject(Request $request){

        $projects = DB::table('projects')->where('place',$request->place)->Where('duration',$request->duration)->orWhere('place',$request->place)->having('published','=','1')->get();
        return view('projects.PublishedProject',[
            'projects' => $projects,
        ]);
    }
}