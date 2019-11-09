<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['blog_title', 'blog_body', 'author_id'];

    public function author() {
        return $this->belongsTo("App\Author");
    }

    public function tags() {
        return $this->belongsToMany("App\Tag", "blog_tag");
    }

}
