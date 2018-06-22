<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];

    public function documents() {
        return $this->hasMany(Document::class);
    }

    public function firstDocument() {
        return $this->documents()->orderBy('sort')->latest();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
