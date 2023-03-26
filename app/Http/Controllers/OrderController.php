<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\AffiliateEarning;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderPlaceNotification;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     *
     *  @return all orders with services
     *
     */
    public  function index()
    {
        $orders = Order::with('getService')->latest()->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function OrderAccept($id)
    {
        $order = Order::find($id);
        $order->status = "Accepted";

        $service = Service::find($order->service_id);
        if ($order->quality == 1) {
            $servicePrice = $service->platinum_price;
        } else if ($order->quality == 2) {
            $servicePrice = $service->gold_price;
        } else if ($order->quality == 3) {
            $servicePrice = $service->silver_price;
        } else {
            $servicePrice = "custom";
        }
        if ($order->affiliate_id != null) {
            // storing affiliate earning
            $affiliateEarning = new AffiliateEarning;
            $affiliateEarning->order_id = $order->id;
            $affiliateEarning->affiliate_id = $order->affiliate_id;
            $affiliateEarning->service_id = $order->service_id;
            if (is_numeric($servicePrice)) {
                $affiliateEarning->amount = ($servicePrice * 10) / 100;
            } else {
                $affiliateEarning->amount = "custom";
            }
            $affiliateEarning->save();
            // storing other earnings
            if (is_numeric($servicePrice)) {
                $order->earnings = ($servicePrice * 90) / 100;
            } else {
                $order->earnings = "custom";
            }

            $order->save();
        } else {
            $order->earnings = $servicePrice;
            $order->save();
        }
        return redirect()->back()->with('success', 'Order Accepted successfully');
    }
    public function OrderCancel($id)
    {
        $value = Order::find($id);
        $value->status = "Cancelled";
        $value->save();
        return redirect()->back()->with('success', 'Order Cancelled successfully');
    }
    public function OrderDelete($id)
    {
        Order::find($id)->delete();
        return redirect()->back()->with('success', 'Order Deleted successfully');
    }
}
