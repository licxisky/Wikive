<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'md_content', 'html_content', 'sort'];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function swapWithBefore() {
        $before = $this->where('sort', '<', $this->sort)->orderBy('sort', 'desc')->first();
        if(!$before) return false;
        $sort = $before->sort;
        $before->update(['sort' => $this->sort]);
        $this->update(['sort' => $sort]);
    }

    public function swapWithAfter() {
        $after = $this->where('sort', '>', $this->sort)->orderBy('sort')->first();
        if(!$after) return false;
        $sort = $after->sort;
        $after->update(['sort' => $this->sort]);
        $this->update(['sort' => $sort]);
    }
}
