<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
    }

    public function show(Document $document, $slug = null) {
        if($document->project->type != '公开') {
            if(!Auth::check() || !$document->project->users()->whereId(Auth::id())->exists()) {
                abort(404);
            }
        }
        if(null == $slug || $slug != $document->title) {
            return redirect()->route('documents.show', [$document, $document->title]);
        }
        return view('documents.show', compact('document'));
    }
}
