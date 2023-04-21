<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

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
     *  @return all orders with products
     *
     */
    public function index()
    {
        $orders = Order::with('getProduct')->latest()->get();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function OrderAccept($id)
    {
        $order = Order::find($id);
        $order->status = "Accepted";

        $product = Product::find($order->product_id);
        if ($order->quality == 1) {
            $productPrice = $product->platinum_price;
        } else if ($order->quality == 2) {
            $productPrice = $product->gold_price;
        } else if ($order->quality == 3) {
            $productPrice = $product->silver_price;
        } else {
            $productPrice = 0;
        }
        if ($order->affiliate_id != null) {
            // storing affiliate earning
            $affiliateEarning = new AffiliateEarning;
            $affiliateEarning->order_id = $order->id;
            $affiliateEarning->affiliate_id = $order->affiliate_id;
            $affiliateEarning->product_id = $order->product_id;
            if (is_numeric($productPrice)) {
                $affiliateEarning->amount = ($productPrice * 10) / 100;
            } else {
                $affiliateEarning->amount = 0;
            }
            $affiliateEarning->save();
            // storing other earnings
            if (is_numeric($productPrice)) {
                $order->earnings = ($productPrice * 90) / 100;
            } else {
                $order->earnings = 0;
            }

            $order->save();
        } else {
            $order->earnings = $productPrice;
            $order->save();
        }
        return redirect()->back()->with('success', 'Order Accepted successfully');
    }
    public function OrderCancel($id)
    {
        $order = Order::find($id);
        $order->status = "Cancelled";
        if ($order->earnings != 0) {
            $order->earnings = 0;
        }
        if ($order->affiliate_id != null) {
            $affiliateEarning = AffiliateEarning::where('order_id', $order->id)->delete();
        }
        $order->save();
        $affiliateEarning = AffiliateEarning::where('order_id', $id)->delete();
        return redirect()->back()->with('success', 'Order Cancelled successfully');
    }
    public function OrderDelete($id)
    {
        Order::find($id)->delete();
        $affiliateEarning = AffiliateEarning::where('order_id', $id)->delete();
        return redirect()->back()->with('success', 'Order Deleted successfully');
    }
}
