<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index() {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }
}
