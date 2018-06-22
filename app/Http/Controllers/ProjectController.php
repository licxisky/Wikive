<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show(Project $project) {
        return redirect()->route('documents.show', [$project->firstDocument()]);
    }
}
