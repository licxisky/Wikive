<?php

namespace App\Policies;

use App\Models\Project;
use App\User;
use App\Models\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    // Common method
    private function userDocument(User $user, Document $document) {
        return $document->project->users()->whereId($user->id)->exists();
    }

    // Common Method
    private function userProject(User $user, Project $project) {
        return $project->users()->whereId($user->id)->exists();
    }

    // Rescource Method
    public function index(User $user, Project $project) {
        return $this->userProject($user, $project);
    }

    public function show(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }

    public function create(User $user, Project $project) {
        return $this->userProject($user, $project);
    }

    public function store(User $user, Project $project) {
        return $this->userProject($user, $project);
    }

    public function edit(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }

    public function update(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }

    public function delete(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }

    public function up(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }

    public function down(User $user, Document $document) {
        return $this->userDocument($user, $document);
    }
}
