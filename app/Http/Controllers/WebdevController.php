<?php

namespace App\Http\Controllers;

use App\Models\Webdev;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class WebdevController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    public function Dev()
    {
        $webdev = Webdev::latest()->get();
        return view('admin.webdev.index', compact('webdev'));
    }
    public function AddDev()
    {
        return view('admin.webdev.add');
    }
    public function StoreDev(Request $request)
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

        Webdev::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.webdev')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $dev = Webdev::find($id);
        return view('admin.webdev.edit', compact('dev'));
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

            Webdev::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.webdev')->with('success', 'Membar Updated successfully');
        } else {
            Webdev::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.webdev')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Webdev::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Webdev::find($id)->delete();
        return redirect()->back()->with('success', 'Membar Deleted successfully');
    }
}
