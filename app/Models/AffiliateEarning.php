<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateEarning extends Model
{
    use HasFactory;
    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function getOrder()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}