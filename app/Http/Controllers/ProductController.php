<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('getProductType', 'getService')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $product_types = ProductType::all();

        return view('admin.product.create', compact('services', 'product_types'));
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
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'image' => 'required|max:50000|mimes:jpg,jpeg,png',
            'service' => 'required',
            'product_type' => 'required',
            'gold_price' => 'required',
            'silver_price' => 'required',
            'platinum_price' => 'required',
            // 'gold_description[]' => 'required',
            // 'silver_description[]' => 'required',
            // 'platinum_description[]' => 'required',

        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(900, 600)->save('image/products/' . $name_gen);

        $last_img = 'image/products/' . $name_gen;
        $description = str_replace(array("\r\n", "\n", "\r"), '<br>', $request->description);
        DB::table('products')->insert([
            'title' => $request->title,
            'description' => $description,
            'service_id' => $request->service,
            'product_type_id' => $request->product_type,
            'gold_price' => $request->gold_price,
            'gold_des' => json_encode($request->gold_description),
            'platinum_price' => $request->platinum_price,
            'platinum_des' => json_encode($request->platinum_description),
            'silver_price' => $request->silver_price,
            'silver_des' => json_encode($request->silver_description),
            'image' => $last_img,
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
        $product = Product::where('id', $id)->with('getProductType', 'getService')->first();
        $product_types = ProductType::all();
        $services = Service::all();
        return view('admin.product.edit', compact('product', 'product_types', 'services'));
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
            'title' => 'required|min:2',
            'description' => 'required|min:2',
            'image' => 'max:50000|mimes:jpg,jpeg,png',
            'service' => 'required',
            'product_type' => 'required',
            'gold_price' => 'required',
            'silver_price' => 'required',
            'platinum_price' => 'required',
            // 'gold_description[]' => 'required',
            // 'silver_description[]' => 'required',
            // 'platinum_description[]' => 'required',

        ]);
        $description = str_replace(array("\r\n", "\n", "\r"), '<br>', $request->description);
        $old_image = $request->old_image;
        $image = $request->image;
        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(900, 600)->save('image/products/' . $name_gen);

            $last_img = 'image/products/' . $name_gen;
            if ($old_image != null) {
                unlink($old_image);
            }
            DB::table('products')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $description,
                'service_id' => $request->service,
                'product_type_id' => $request->product_type,
                'gold_price' => $request->gold_price,
                'gold_des' => json_encode($request->gold_description),
                'platinum_price' => $request->platinum_price,
                'platinum_des' => json_encode($request->platinum_description),
                'silver_price' => $request->silver_price,
                'silver_des' => json_encode($request->silver_description),
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);

        } else {
            DB::table('products')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $description,
                'service_id' => $request->service,
                'product_type_id' => $request->product_type,
                'gold_price' => $request->gold_price,
                'gold_des' => json_encode($request->gold_description),
                'platinum_price' => $request->platinum_price,
                'platinum_des' => json_encode($request->platinum_description),
                'silver_price' => $request->silver_price,
                'silver_des' => json_encode($request->silver_description),
                'created_at' => Carbon::now(),
            ]);

        }
        return redirect()->route('products.index')->with('success', 'Product Updated successfully');
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
        // $old_image = $image->image;
        // unlink($old_image);
        Product::find($id)->delete();
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }
}
