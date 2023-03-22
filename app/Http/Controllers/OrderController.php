<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\OrderPlaceNotification;

class OrderController extends Controller
{
    public function getInfo(Request $request)
    {
        $data = $request->only(['service_id', 'quality', 'promoCode']);
        return view('frontend.service.order.getInfo', ['data' => $data]);
        // return $request->all();
    }
    public function placeOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'min:10 | required',
            'reason' => 'required | min:20',
            'description' => 'required | min:20',
            'serviceId' => 'required',
            'quality' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'data' => $validator->messages()
            ], 200);
        } else {
            $order = Order::create([
                'name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->countryCode . " " . $request->phone,
                'company' => $request->companyName,
                'country' => $request->countryName,
                'companySize' => $request->companySize,
                'reason' => $request->reason,
                'description' => $request->description,
                'quality' => $request->quality,
                'service_id' => $request->serviceId,
                'affiliate_id' => $request->promoCode
            ]);
            $order->notify(new OrderPlaceNotification);
            return response()->json([
                'status' => 1,
                'data' => "Your order has been placed successfully. Our employee will contact you soon thorough your phone number."
            ], 200);
        }
    }
}
