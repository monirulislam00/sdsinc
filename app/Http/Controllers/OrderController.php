<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getInfo(Request $request)
    {
        $data = $request->only(['service_id', 'quality', 'promoCode']);
        return view('frontend.service.order.getInfo', ['data'  => $data]);
        // return $request->all();
    }
}
