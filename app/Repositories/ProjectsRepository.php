<?php

namespace App\Repositories;

use App\Project;
use Image;

class ProjectsRepository{
    public function newProject($request){
        $request->user()->project()->create([
            'place' => $request->place,
            'duration' => $request->duration,
            'thumbnail' =>$this->thumbnail($request)
        ]);
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

}