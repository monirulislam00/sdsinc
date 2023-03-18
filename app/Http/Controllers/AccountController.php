<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    public function Account()
    {
        $accounts = Account::latest()->get();
        return view('admin.account.index', compact('accounts'));
    }
    public function AddAccount()
    {
        return view('admin.account.add');
    }
    public function StoreAccount(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|min:3',
            'title'     => 'required',
            'phone'     => 'required|min:11',
            'mail'      => 'required|min:10',
            'image'     => 'required|mimes:jpg,jpeg,png'
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

        $last_img = 'image/team/' . $name_gen;

        Account::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.account')->with('success', 'Member inserted successfully');
    }
    public function Edit($id)
    {
        $account = Account::find($id);
        return view('admin.account.edit', compact('account'));
    }
    public function Update(Request $request, $id)
    {
        $old_image = $request->old_image;
        $image     = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

            $last_img = 'image/team/' . $name_gen;
            unlink($old_image);

            Account::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.account')->with('success', 'Member Updated successfully');
        } else {
            Account::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.account')->with('success', 'Member Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Account::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Account::find($id)->delete();
        return redirect()->back()->with('success', 'Member Deleted successfully');
    }
}
