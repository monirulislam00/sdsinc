<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AffiliateEarning;

class AffiliateEarningController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:affiliated'])->only(['getEarnings']);
    }
    public function getEarnings()
    {
        $affiliate_id = auth()->user()->uniqueId;
        $earnings = AffiliateEarning::where('affiliate_id', $affiliate_id)->with('getProduct', 'getOrder')->latest()->get();
        // return $earnings;
        // return  $earnings;
        return view('affiliated.earnings.index', ['earnings' => $earnings]);
    }
}