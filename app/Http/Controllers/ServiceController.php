<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Service;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(['permission:view services'])->only(['index']);
        $this->middleware(['permission:create services'])->only(['create']);
        $this->middleware(['permission:edit services'])->only(['store']);
        $this->middleware(['permission:delete services'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.service.create');
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
            'service_name' => 'required',
            'description' => 'required|min:4|max:140',

            'image' => 'required|max:50000|mimes:jpg,jped,png',
        ]);

        $Service_image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $Service_image->getClientOriginalExtension();
        Image::make($Service_image)->resize(1920, 1088)->save('image/service/' . $name_gen);
        $last_img = 'image/service/' . $name_gen;

        Service::insert([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('service.index')->with('success', 'Service Inserted successfully');
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
        $service = Service::where('id', $id)->first();

        return view('admin.service.edit', compact('service'));
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
            'service_name' => 'required',
            'description' => 'required|min:4|max:140',

        ]);
        $old_image = $request->old_image;
        $service_image = $request->image;

        if ($service_image) {
            $name_gen = hexdec(uniqid()) . '.' . $service_image->getClientOriginalExtension();
            Image::make($service_image)->resize(1920, 1088)->save('image/service/' . $name_gen);
            $last_img = 'image/service/' . $name_gen;
            unlink($old_image);
            Service::find($id)->update([
                'service_name' => $request->service_name,
                'description' => $request->description,
                'image' => $last_img,

                'created_at' => Carbon::now(),
            ]);
        } else {
            Service::find($id)->update([
                'service_name' => $request->service_name,
                'description' => $request->description,

                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect()->route('service.index')->with('success', 'Service Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        // $old_image = $service->image;
        // unlink($old_image);
        $products = Product::where('service_id', $id)->get();
        foreach ($products as $product) {
            $product->delete();
        }
        Service::find($id)->delete();
        return redirect()->route('service.index')->with('success', 'Service Deleted successfully');
    }
}
