<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\AffiliateEarning;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AffiliatedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:affiliated']);
    }
    public function index()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $transactions = AffiliateEarning::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
        $monthlyEarnings = $transactions->sum('amount');

        $totalAmount = DB::table('affiliate_earnings')->sum('amount');

        return view('affiliated.index', compact('totalAmount', 'monthlyEarnings'));
    }
    public function products()
    {
        $products = Product::latest()->paginate(15);
        $userId = Auth::user()->uniqueId;
        return view('affiliated.products.index', compact('products', 'userId'));
    }
}
