<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderPlaceNotification;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    /**
     *
     *  @return all orders with services
     *
     */
    public  function index()
    {
        $orders = Order::with('getService')->get();
        return view('admin.orders.index', ['orders' => $orders]);
        return $orders;
    }
    /**
     *
     * @return only orders had been done through link / promocode
     *
     */
    public function getAffiliateOrders()
    {
    }
}
