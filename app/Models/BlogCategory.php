<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogCategory extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    public function getBlogs()
    {
        return $this->hasMany(Blog::class, 'cat_id', 'id');
    }
}
