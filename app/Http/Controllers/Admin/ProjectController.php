<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index() {
        $projects = Project::with('user')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create() {
        return view('admin.projects.create');
    }

    public function store(ProjectRequest $projectRequest, Project $project){
        Auth::user()->projects()->create($projectRequest->all());
        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project) {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $projectRequest, Project $project) {
        $project->update($projectRequest->all());
        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project) {
        $project->delete();
        return back();
    }
}
