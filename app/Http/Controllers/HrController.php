<?php

namespace App\Http\Controllers;

use App\Models\HR;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    public function HR()
    {
        $hrs = HR::latest()->get();
        return view('admin.hr.index', compact('hrs'));
    }
    public function AddHR()
    {
        return view('admin.hr.add');
    }
    public function StoreHR(Request $request)
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

        HR::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.HR')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $hr = HR::find($id);
        return view('admin.hr.edit', compact('hr'));
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

            HR::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.HR')->with('success', 'Membar Updated successfully');
        } else {
            HR::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.HR')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = HR::find($id);
        $old_image = $image->image;
        unlink($old_image);
        HR::find($id)->delete();
        return redirect()->back()->with('success', 'Membar Deleted successfully');
    }
}
