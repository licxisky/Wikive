<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'type'];

    public function documents() {
        return $this->hasMany(Document::class)->orderBy('sort');
    }

    public function firstDocument() {
        return $this->documents()->orderBy('sort')->latest();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
