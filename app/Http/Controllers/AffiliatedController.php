<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AffiliatedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:affiliated']);
    }
    public function index()
    {
        $totalAmount = DB::table('affiliate_earnings')->sum('amount');
        return view('affiliated.index',compact('totalAmount'));
    }
    public function services()
    {
        $services = Service::latest()->paginate(15);
        $userId = Auth::user()->uniqueId;
        return view('affiliated.services.index', compact('services', 'userId'));
    }
}
