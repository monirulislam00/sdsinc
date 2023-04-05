<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name',
        'description',
        'image',
        'service_cat',
    ];
    public function getServiceType()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_cat', 'id');
    }
}
