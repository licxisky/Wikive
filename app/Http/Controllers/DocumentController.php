<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function __construct()
    {
    }

    public function show(Document $document, $slug = null) {
        if(null == $slug || $slug != $document->title) {
            return redirect()->route('documents.show', [$document, $document->title]);
        }
        return view('documents.show', compact('document'));
    }
}
