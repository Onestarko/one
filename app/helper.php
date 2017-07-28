<?php

//设置全局方法方便调用

function TasksCountArray($projects){
    $counts = [];
    foreach ($projects as $project){
        $perCount = $project->tasks->count();
        array_push($counts,$perCount);
    }

    return $counts;
}


function rand_color(){
    $R = rand(0,255);
    $G = rand(0,255);
    $B = rand(0,255);
    return 'rgba('.$R.','.$G.','.$B.',0.5)';
}