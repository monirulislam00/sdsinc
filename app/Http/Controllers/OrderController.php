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
        $this->middleware(['role:admin'])->only(['index']);
        $this->middleware(['role:affiliated'])->only(['getAffiliateOrders']);
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
        $orders = Order::latest()->get();
        return view('admin.affiliates.link.index', ['orders' => $orders]);
    }
    public function OrderAccept($id){
        $value = Order::find($id);
        $value->status = "Accepted";
        $value->save();
        return redirect()->back()->with('success', 'Order Accepted successfully');
    }
    public function OrderCancel($id){
        $value = Order::find($id);
        $value->status = "Cancelled";
        $value->save();
        return redirect()->back()->with('success', 'Order Cancelled successfully');
    }
    public function OrderDelete($id){
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'Order Deleted successfully');
    }
}
