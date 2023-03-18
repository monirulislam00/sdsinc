<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'image', 'gold_price', 'platinum_price', 'silver_price', 'gold_des', 'platinum_des', 'silver_des'
    ];
}
