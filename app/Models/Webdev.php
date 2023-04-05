s<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webdev extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','company','title','phone','mail','image'
    ];
}
