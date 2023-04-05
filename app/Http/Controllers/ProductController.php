<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Bus\PrunableBatchRepository;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view products'])->only(['index']);
        $this->middleware(['permission:create products'])->only(['create']);
        $this->middleware(['permission:edit products'])->only(['edit']);
        $this->middleware(['permission:delete products'])->only(['destroy']);
    }
    public function Service()
    {
        $services = Service::latest()->paginate(15);
        $userId = Auth::user()->uniqueId;
        return view('admin.service.index', compact('services', 'userId'));
    }
    public function createService()
    {
        return view('admin.service.create');
    }
    public function StoreService(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'image' => 'required|max:50000|mimes:jpg,jpeg,png',
            'gold_price' => 'required',
            'silver_price' => 'required',
            'platinum_price' => 'required',
            'gold_des' => 'required',
            'silver_des' => 'required',
            'platinum_des' => 'required',

        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(900, 600)->save('image/service/' . $name_gen);

        $last_img = 'image/service/' . $name_gen;

        Service::insert([
            'title' => $request->title,
            'description' => $request->description,
            'gold_price' => $request->gold_price,
            'gold_des' => $request->gold_des,
            'platinum_price' => $request->platinum_price,
            'platinum_des' => $request->platinum_des,
            'silver_price' => $request->silver_price,
            'silver_des' => $request->silver_des,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('service')->with('success', 'service Inserted successfully');
    }
    public function Edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'image' => 'max:50000|mimes:jpg,jpeg,png',
            'gold_price' => 'required',
            'silver_price' => 'required',
            'platinum_price' => 'required',
            'gold_des' => 'required',
            'silver_des' => 'required',
            'platinum_des' => 'required',

        ]);
        $old_image = $request->old_image;
        $image = $request->image;
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(900, 600)->save('image/service/' . $name_gen);

            $last_img = 'image/service/' . $name_gen;
            if ($old_image != null) {
                unlink($old_image);
            }
            Service::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'gold_price' => $request->gold_price,
                'gold_des' => $request->gold_des,
                'platinum_price' => $request->platinum_price,
                'platinum_des' => $request->platinum_des,
                'silver_price' => $request->silver_price,
                'silver_des' => $request->silver_des,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('service')->with('success', 'service Updated successfully');
        } else {
            Service::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'gold_price' => $request->gold_price,
                'gold_des' => $request->gold_des,
                'platinum_price' => $request->platinum_price,
                'platinum_des' => $request->platinum_des,
                'silver_price' => $request->silver_price,
                'silver_des' => $request->silver_des,
                'created_at' => Carbon::now(),
            ]);

            return redirect()->route('service')->with('success', 'service Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Service::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Service::find($id)->delete();
        return redirect()->back()->with('success', 'service Deleted successfully');
    }
}
