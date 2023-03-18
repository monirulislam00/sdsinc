<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;


class Blog extends Model

{

    use HasFactory;
    protected $fillable = [
        'title', 'type', 'description', 'image', 'cat_id', 'visits'
    ];
    public function getCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'cat_id', 'id');
    }
}
