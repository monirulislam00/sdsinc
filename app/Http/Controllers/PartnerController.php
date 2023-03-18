<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view partner'])->only(['Partner']);
        $this->middleware(['permission:create partner'])->only(['StorePartner']);
        $this->middleware(['permission:edit partner'])->only(['Edit']);
        $this->middleware(['permission:delete partner'])->only(['Delete']);
    }
    public function Partner()
    {
        $partners = Partner::latest()->get();
        return view('admin.partner.index', compact('partners'));
    }
    public function StorePartner(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|max:50000|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(100, null)->save('image/partner/' . $name_gen);

        $last_img = 'image/partner/' . $name_gen;

        Partner::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('partner')->with('success', 'partner Inserted successfully');
    }
    public function Edit($id)
    {
        $partner = Partner::find($id);
        return view('admin.partner.edit', compact('partner'));
    }
    public function Update(Request $request, $id)
    {
        $old_image  = $request->old_image;
        $image      = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(100, null)->save('image/partner/' . $name_gen);

            $last_img = 'image/partner/' . $name_gen;
            unlink($old_image);
            Partner::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('partner')->with('success', 'partner Updated successfully');
        } else {
            Partner::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('partner')->with('success', 'partner Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Partner::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Partner::find($id)->delete();
        return redirect()->back()->with('success', 'partner Deleted successfully');
    }
}
