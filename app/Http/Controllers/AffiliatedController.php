<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatedController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:affiliated']);
    }
    public function index()
    {
        return view('affiliated.index');
    }
    public function services()
    {
        $services = Service::latest()->paginate(15);
        $userId = Auth::user()->uniqueId;
        return view('affiliated.services.index', compact('services', 'userId'));
    }
}
