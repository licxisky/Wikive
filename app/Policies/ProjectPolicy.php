<?php

namespace App\Policies;

use App\User;
use App\Models\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can create projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        return $project->user->id == $user->id;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function delete(User $user, Project $project)
    {
        return $project->user->id == $user->id;
    }
}
