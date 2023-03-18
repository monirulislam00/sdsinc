<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\E_commerce;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    public function Ecom()
    {
        $ecommerce = E_commerce::latest()->get();
        return view('admin.ecommerce.index', compact('ecommerce'));
    }
    public function AddEcom()
    {
        return view('admin.ecommerce.add');
    }
    public function StoreEcom(Request $request)
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

        E_commerce::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.ecom')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $ecom = E_commerce::find($id);
        return view('admin.ecommerce.edit', compact('ecom'));
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

            E_commerce::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.ecom')->with('success', 'Membar Updated successfully');
        } else {
            E_commerce::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.ecom')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = E_commerce::find($id);
        $old_image = $image->image;
        unlink($old_image);

        E_commerce::find($id)->delete();
        return redirect()->back()->with('success', 'Membar Deleted successfully');
    }
}
