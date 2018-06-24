<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\User;
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
        $users = User::all();
        return view('admin.projects.create', compact('users'));
    }

    public function store(ProjectRequest $projectRequest){
        $project = Auth::user()->createProjects()->create($projectRequest->all());
        $project->users()->attach($projectRequest->users);
        return redirect()->route('admin.projects.index');
    }

    public function edit(Project $project) {
        $this->authorize('update', $project);
        $project->load('users');
        $users = User::all();
        return view('admin.projects.edit', compact('project', 'users'));
    }

    public function update(ProjectRequest $projectRequest, Project $project) {
        $this->authorize('update', $project);
        $project->update($projectRequest->all());
        $project->users()->detach();
        $project->users()->attach($projectRequest->users);
        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project) {
        $this->authorize('delete', $project);
        $project->delete();
        return back();
    }
}
