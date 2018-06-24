<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentRequest;
use App\Http\Requests\ProjectRequest;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Project $project) {
        return view('admin.documents.index', compact('project'));
    }

    public function show(Project $project, Document $document) {
        return view('admin.documents.show', compact('document', 'project'));
    }

    public function create(Project $project) {
        return view('admin.documents.create', compact('project'));
    }

    public function store(DocumentRequest $documentRequest, Project $project) {
        $project->increment('max_sort');
        $document = $project->documents()->create($documentRequest->all() + ['sort' => $project->max_sort]);
        return redirect()->route('admin.projects.documents.show', [$project, $document]);
    }

    public function edit(Project $project, Document $document) {
        return view('admin.documents.edit', compact('project', 'document'));
    }

    public function update(DocumentRequest $documentRequest, Project $project, Document $document) {
        $document->update($documentRequest->all());
        return redirect()->route('admin.projects.documents.show', [$project, $document]);
    }

    public function destroy(Project $project, Document $document) {
        $document->delete();
        return back();
    }

    public function up(Project $project, Document $document) {
        $document->swapWithBefore();
        return back();
    }

    public function down(Project $project, Document $document) {
        $document->swapWithAfter();
        return back();
    }
}
