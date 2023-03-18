<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view messages'])->only(['Contact']);
        $this->middleware(['permission:delete messages'])->only(['Delete']);
    }
    public function Contact()
    {
        $contacts = DB::table('contacts')->latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }
    public function Delete($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with('success', 'Contact Message Delete successfully');
    }
}
