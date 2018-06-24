<?php

namespace App\Policies;

use App\Models\Project;
use App\User;
use App\Models\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Document  $document
     * @return mixed
     */
    public function view(User $user, Document $document)
    {
        return $document->project->users()->whereId($user->id)->exists();
    }

    /**
     * Determine whether the user can create documents.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Project $project)
    {
        return $project->users()->whereId($user->id)->exists();
    }

    /**
     * Determine whether the user can update the document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Document  $document
     * @return mixed
     */
    public function update(User $user, Document $document)
    {
        return $document->project->users()->whereId($user->id)->exists();
    }

    /**
     * Determine whether the user can delete the document.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Document  $document
     * @return mixed
     */
    public function delete(User $user, Document $document)
    {
        return $document->project->users()->whereId($user->id)->exists();
    }
}
