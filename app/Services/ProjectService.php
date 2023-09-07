<?php

namespace App\Services;

use App\Models\Project;


class ProjectService
{


    public function storeProject($data)
    {
        $project =  Project::create($data);
        return $project;
    }


}
