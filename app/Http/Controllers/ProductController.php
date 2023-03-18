<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|min:4|max:140',
            'type' => 'required',
            'image' => 'required|max:50000|mimes:jpg,jped,png',
        ]);

        $product_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $product_image->getClientOriginalExtension();
        Image::make($product_image)->resize(100, 100)->save('image/products/' . $name_gen);

        $last_img = 'image/products/' . $name_gen;

        Product::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'type' => $request->type,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('products.index')->with('success', 'Product Inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required|min:4|max:140',
            'type' => 'required',
        ]);
        $old_image = $request->old_image;
        $product_image = $request->image;

        if ($product_image) {

            $name_gen = hexdec(uniqid()) . '.' . $product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(1920, 1088)->save('image/products/' . $name_gen);

            $last_img = 'image/products/' . $name_gen;

            unlink($old_image);

            Product::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'type' => $request->type,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('products.index')->with('success', 'product Updated successfully');
        } else {
            Product::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'created_at' => Carbon::now(),
            ]);
            return redirect()->route('products.index')->with('success', 'product Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Product::find($id);
        $old_image = $image->image;
        unlink($old_image);

        Product::find($id)->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted successfully');
    }
}
