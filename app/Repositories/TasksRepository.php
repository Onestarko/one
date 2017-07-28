<?php

namespace App\Repositories;

use App\Task;

class TasksRepository{
    public function total(){
        $total = Task::count();
        return $total;
    }

    public function doneCount(){
        $doneCount = Task::where('completed',1)->count();
        return $doneCount;
    }

    public function toDoCount(){
        $toDoCount = Task::where('completed',0)->count();
        return $toDoCount;
    }
}
