<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'title','project_id','completed'
    ];

    public function project(){
/*        任务与项目关系:多对一*/
        return $this->belongsTo('App\Project');
    }

   public function getProjectListAttribute(){
        return $this->project->id;
   }
}
