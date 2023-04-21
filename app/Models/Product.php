<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'gold_price',
        'platinum_price',
        'silver_price',
        'gold_des',
        'platinum_des',
        'silver_des',
        'product_type_id'
    ];
    public function getService()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function getProductType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }
}
