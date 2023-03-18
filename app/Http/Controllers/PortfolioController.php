<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view portfolio'])->only(['Portfolio']);
        $this->middleware(['permission:create portfolio'])->only(['StorePortfolio']);
        $this->middleware(['permission:edit portfolio'])->only(['Edit']);
        $this->middleware(['permission:delete portfolio'])->only(['Delete']);
    }
    public function Portfolio()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.index', compact('portfolios'));
    }
    public function StorePortfolio(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:4',
            'type' => 'required|min:2',
            'image' => 'required|max:50000|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(390, 390)->save('image/portfolio/' . $name_gen);

        $last_img = 'image/portfolio/' . $name_gen;

        Portfolio::insert([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'Portfolio Inserted successfully');
    }
    public function Edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }
    public function Update(Request $request, $id)
    {
        $old_image  = $request->old_image;
        $image      = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(390, 390)->save('image/portfolio/' . $name_gen);

            $last_img = 'image/portfolio/' . $name_gen;
            unlink($old_image);
            Portfolio::find($id)->update([
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('portfolio')->with('success', 'Portfolio Updated successfully');
        } else {
            Portfolio::find($id)->update([
                'name' => $request->name,
                'type' => $request->type,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('portfolio')->with('success', 'Portfolio Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Portfolio::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Portfolio::find($id)->delete();
        return redirect()->back()->with('success', 'Portfolio Deleted successfully');
    }
}
