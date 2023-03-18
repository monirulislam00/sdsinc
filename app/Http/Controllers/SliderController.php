<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view slider'])->only(['SliderView']);
        $this->middleware(['permission:create slider'])->only(['StoreSlider']);
        $this->middleware(['permission:edit slider'])->only(['Edit']);
        $this->middleware(['permission:delete slider'])->only(['Delete']);
    }
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }
    public function StoreSlider(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4',
            'description' => 'required|min:4',
            'image' => 'required|max:50000|mimes:jpg,jped,png',
        ]);

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);

        $last_img = 'image/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('slider')->with('success', 'Slider Inserted successfully');
    }
    public function Edit($id)
    {
        $sliders = Slider::find($id);
        return view('admin.slider.edit', compact('sliders'));
    }
    public function Update(Request $request, $id)
    {

        $old_image = $request->old_image;
        $slider_image = $request->image;

        if ($slider_image) {

            $name_gen = hexdec(uniqid()) . '.' . $slider_image->getClientOriginalExtension();
            Image::make($slider_image)->resize(1920, 1088)->save('image/slider/' . $name_gen);

            $last_img = 'image/slider/' . $name_gen;

            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('slider')->with('success', 'Slider Updated successfully');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('slider')->with('success', 'Slider Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Slider::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return redirect()->route('slider')->with('success', 'Slider Deleted successfully');
    }
}
