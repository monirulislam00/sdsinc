<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getInfo(Request $request)
    {
        $data = $request->only(['service_id', 'quality', 'promoCode']);
        return view('frontend.service.order.getInfo', ['data'  => $data]);
        // return $request->all();
    }
    public function placeOrder(Request $request)
    {
        // $validated = $request->validate([
        //     'fullName'       => 'required',
        //     'email'      => 'required',
        //     'phone'      => 'min:10 | required',
        //     'description'    => 'required',
        // ]);

        // Order::insert([
        //     'fullName'          => $request->fullName,
        //     'email'         => $request->email,
        //     'phone'         => $request->countryCode . " " . $request->phone,
        //     'companyname'   => $request->companyName,
        //     'countryName' => $request->countryName,
        //     'enquiryType'       => $request->enquiryType,
        //     'fromWhereHeard'       => $request->fromWhereHeard,
        //     'message'       => $request->message,
        // ]);

        session()->flash(
            "alert",
            "Message sent successfully"
        );
        // return redirect()->route('service.info');
    }
}
