<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view features'])->only(['FeatureView']);
        $this->middleware(['permission:create features'])->only(['StoreFeature']);
        $this->middleware(['permission:edit features'])->only(['Edit']);
        $this->middleware(['permission:delete features'])->only(['Delete']);
    }
    public function FeatureView()
    {
        $features = Feature::latest()->get();
        return view('admin.feature.index', compact('features'));
    }
    public function StoreFeature(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:4',
            'image' => 'required|max:50000|mimes:SVG,png',
        ]);
        $feature_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $feature_image->getClientOriginalExtension();
        Image::make($feature_image)->resize(1920, 1088)->save('image/feature/' . $name_gen);

        $last_img = 'image/feature/' . $name_gen;

        Feature::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('feature')->with('success', 'Feature Inserted successfully');
    }
    public function Edit($id)
    {
        $features = Feature::find($id);
        return view('admin.feature.edit', compact('features'));
    }
    public function Update(Request $request, $id)
    {

        $old_image = $request->old_image;
        $feature_image = $request->image;

        if ($feature_image) {

            $name_gen = hexdec(uniqid()) . '.' . $feature_image->getClientOriginalExtension();
            Image::make($feature_image)->resize(1920, 1088)->save('image/feature/' . $name_gen);

            $last_img = 'image/feature/' . $name_gen;

            unlink($old_image);

            Feature::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('feature')->with('success', 'Feature Updated successfully');
        } else {
            Feature::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('feature')->with('success', 'Feature Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Feature::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Feature::find($id)->delete();
        return redirect()->route('feature')->with('success', 'Feature Deleted successfully');
    }
}
