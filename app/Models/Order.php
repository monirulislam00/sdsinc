<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'country',
        'companySize',
        'reason',
        'description',
        'quality',
        'product_id',
        'affiliate_id',
        'product_type'
    ];
    public function getProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
