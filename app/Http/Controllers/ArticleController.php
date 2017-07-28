<?php
/*文章的相关方法*/

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;

use App\Article;

use Illuminate\Support\Facades\DB;

use Auth;
use Illuminate\Support\Facades\Redirect;
use TomLingham\Searchy\Facades\Searchy;
use Overtrue\Pinyin\Pinyin;

class ArticleController extends Controller{

    //初始化，确保进行文章相关操作是用户登录状态
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function writeArticle(Request $request){

        $article = new Article();

        if($request->isMethod('POST')){

            $data = $request->input('Article');

            $name  = $data['name'];

            $user_id = Auth::id();

            $pinyin = new Pinyin();

           $pinyin =  $pinyin->permalink($name);

            $bool = DB::insert('insert into articles (name,pinyin,content,user_id) values(?,?,?,?)',[

                $data['name'],
                $pinyin,
                $data['content'],
                $user_id,

            ]);

            if($bool){
               echo "<script> alert('新建成功!'); window.location.href='/one/public/articleList' </script>";
            }else{
                return redirect()->back();
            }
        }
        return view('article.writeArticle');

    }


    public function articleList(){

        $user = User::find(Auth::id());

        $author = $user->name;
        //依据创建时间进行降序排列
        $articles = Auth()->user()->articles()->orderBy('created_at','DESC')->paginate(4);

        return view('article.articleList',[
            'articles' => $articles,
            'author' => $author
        ]);
    }

    public function deleteArticle($id){

        Article::find($id)->delete();

        return Redirect::back();
    }



    public function editArticle(Request $request,$id){

        //列出文章已有内容，为修改文章做准备步骤
        $article = Article::findorFail($id);

        return view('article/editArticle',[
            'article' => $article,
        ]);

    }

    public function saveEdit(Request $request,$id){

        $article = Article::findorFail($id);

        $data = $request->input('Article');

        $article->name = $data['name'];

        $pinyin = new Pinyin();

        $article->pinyin =  $pinyin->permalink($data['name']);

        $article->content = $data['content'];

        $user_id = Auth::id();

        $article->user_id = $user_id;

        $bool  = $article->save();

        if($bool){
            echo "<script> alert('修改成功!'); window.location.href='/one/public/articleList' </script>";
        }else{
            return redirect()->back();
        }

    }


    public function publishArticle($id){

        $article = Article::findorFail($id);

        if($article->published == 1){

           echo "<script>alert('此篇文章已经发布咯...');window.location.href='/one/public/publishedArticle'</script>";

        }else{

            $article->published = 1;

            $bool = $article->save();

            echo "<script>alert('发布成功...');window.location.href='/one/public/publishedArticle'</script>";
        }

    }


    public function publishedArticle(){

        //列出已经发布的文章，并按照创建时间降序排列
        $articles = Article::where('published',1)->orderBy('created_at','DESC')->paginate(10);

        return view('article.publishedArticle',[
            'articles' => $articles
        ]);
    }

    public function unPublish($id){

        //取消发布，即将published设置为0

       $article =  Article::find($id);

       $article->published = 0 ;

       $bool = $article->save();

       if($bool){

           echo "<script> alert('取消成功!'); window.location.href='/one/public/publishedArticle' </script>";
       }

    }

    public function comment(Request $request,$id){

        //将相关评论信息存入数据库
        $comment  = new Comment();

        $comment->user_id  = Auth::id();

        $comment->article_id = $id;

        $comment->content = $request->input('comment');

        $bool = $comment->save();

        if($bool){
            return redirect()->back();
        }
    }

    public function deleteComment($id){

        $bool = Comment::find($id)->delete();

        if($bool){
            return redirect()->back();
        }
    }

    public function search(Request $request){
        $query = $request->search;
        $pinyin = new Pinyin();
        $query_pinyin = $pinyin->permalink($query);
        $user_id = Auth::id();
        $articles = Searchy::articles('pinyin')->query($query_pinyin)->getQuery()->having('user_id', '=', $user_id)->get();
        return view('article.searchList',[
            'articles' => $articles
        ]);
    }

    public function publishedSearch(Request $request){
        $query =$request->search;
        $pinyin = new Pinyin();
        $query_pinyin = $pinyin->permalink($query);
        $articles = Searchy::articles('pinyin')->query($query_pinyin)->getQuery()->having('published','=','1')->get();
        return view('article.publishedSearchList',[
            'articles' => $articles
        ]);
    }
}