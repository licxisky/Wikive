<?php
/**
 * Created by PhpStorm.
 * User: LiCxi
 * Date: 2018/6/22
 * Time: 13:10
 */

namespace App\Observers;


use App\Models\Project;

class ProjectObserver
{
    public function creating(Project $project) {
        $project->max_sort = 0;
    }

    public function deleting(Project $project) {
        $project->documents()->delete();
    }
}