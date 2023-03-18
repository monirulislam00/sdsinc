<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Bio_metric;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class Bio_metricController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:admin']);
    }
    public function Bio_Metric()
    {
        $bio_metrics = Bio_metric::latest()->get();
        return view('admin.biometric.index', compact('bio_metrics'));
    }
    public function AddBio()
    {
        return view('admin.biometric.add');
    }
    public function StoreBio(Request $request)
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

        Bio_metric::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.biometric')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $bio = Bio_metric::find($id);
        return view('admin.biometric.edit', compact('bio'));
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

            Bio_metric::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.biometric')->with('success', 'Membar Updated successfully');
        } else {
            Bio_metric::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.biometric')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Bio_metric::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Bio_metric::find($id)->delete();
        return redirect()->back()->with('success', 'Membar Deleted successfully');
    }
}
