<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'md_content', 'html_content'];

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
