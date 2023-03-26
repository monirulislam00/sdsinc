<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateEarning extends Model
{
    use HasFactory;
    public function getService()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
    public function getOrder()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
