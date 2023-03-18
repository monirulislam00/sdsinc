<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio_metric extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','company','title','phone','mail','image'
    ];
}
