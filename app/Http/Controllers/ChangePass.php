<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ChangePass extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CPassword()
    {
        return view('admin.body.change_password');
    }
    public function UpdatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password'    => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password Changed successfully');
        } else {
            return redirect()->back()->with('error', 'Current Password Invalid');
        }
    }
    public function PUpdate()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }
    public function UpdateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('success', 'Profile update successfully');
        } else {
            return redirect()->back();
        }
    }
}
