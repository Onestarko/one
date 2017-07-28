<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {

    //相关路由设置

    Route::auth();

    Route::get('/', function () {
       return view('onestarko/home');
    });

    Route::any('/task_all',['uses'=>'HomeController@welcome']);

    Route::get('/home', 'HomeController@index');

    Route::resource('projects','ProjectController');

    Route::resource('tasks','Taskscontroller');

    Route::any('charts',['uses'=>'TasksController@charts']);

    Route::post('tasks/{id}/check',['as'=>'tasks.check','uses'=>'TasksController@check']);

    Route::any('writeArticle',['uses'=>'ArticleController@writeArticle']);

    Route::any('articleList',['uses'=>'ArticleController@articleList']);

    Route::any('readArticle/{id}',['uses'=>'PublishedController@readArticle']);

    Route::any('deleteArticle/{id}',['uses'=>'ArticleController@deleteArticle']);

    Route::any('music',['uses'=>'MusicController@music']);

    Route::any('message',['uses'=>'MessageController@showMessage']);

    Route::any('createMessage',['uses'=>'MessageController@createMessage']);

    Route::any('editArticle/{id}',['uses'=>'ArticleController@editArticle']);

    Route::any('saveEdit/{id}',['uses'=>'ArticleController@saveEdit']);

    Route::any('publishArticle/{id}',['uses'=>'ArticleController@publishArticle']);

    Route::any('publishedArticle',['uses'=>'PublishedController@publishedArticle']);

    Route::any('unPublish/{id}',['uses'=>'ArticleController@unPublish']);

    Route::any('comment/{id}',['uses'=>'ArticleController@comment']);

    Route::any('deleteComment/{id}',['uses'=>'ArticleController@deleteComment']);

    Route::any('search',['uses' => 'ArticleController@search']);

    Route::any('publishedSearch',['uses' => 'ArticleController@publishedSearch']);

    Route::any('createProject',['uses'=>'ProjectController@createProject']);

    Route::any('showProject/{id}',['uses'=>'ProjectController@showProject']);

    Route::any('createTask',['uses'=>'TasksController@createTask']);

    Route::any('publishProject/{id}',['uses'=>'ProjectController@publishProject']);

    Route::any('publishedProject',['uses'=>'PublishedController@publishedProject']);

    Route::any('showPublishedProject/{id}',['uses'=>'PublishedController@showPublishedProject']);

    Route::any('searchProject',['uses'=>'PublishedController@searchProject']);

   Route::any('updateProject/{id}',['uses'=>'ProjectController@update']);
});
