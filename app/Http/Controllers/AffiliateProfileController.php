<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliateProfileController extends Controller
{
    public function profile()
    {
        if (Auth::user()) {
            $affiliateMarketer = User::find(Auth::user()->id);
            if ($affiliateMarketer != null) {
                return view('affiliated.profile.update', ['affiliateMarketer' => $affiliateMarketer]);
            } else {
                abort(404);
            }
        }
    }
    public function UpdateProfile(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'phone' => 'required|max:255|unique:users,phone,' . Auth::user()->id,
            'whatsapp' => 'required|max:255|unique:users,whatsapp,' . Auth::user()->id,
            'cardNumber' => 'required|max:255|unique:users,cardNumber,' . Auth::user()->id,
        ]);
        $affiliateMarketer = User::find(Auth::user()->id);
        if ($affiliateMarketer) {
            $affiliateMarketer->name = $request->name;
            $affiliateMarketer->email = $request->email;
            $affiliateMarketer->phone = $request->phone;
            $affiliateMarketer->whatsapp = $request->whatsapp;
            $affiliateMarketer->cardNumber = $request->cardNumber;
            $affiliateMarketer->save();
            return redirect()->back()->with('success', 'Profile update successfully');
        } else {
            return redirect()->back();
        }
    }
}
