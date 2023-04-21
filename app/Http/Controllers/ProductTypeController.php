<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view products'])->only(['index']);
        $this->middleware(['permission:create products'])->only(['store']);
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
        $product_types = ProductType::all();
        return view('admin.product_type.index', compact('product_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product_type.create');
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
            'catagory_name' => 'required',
        ]);
        ProductType::insert([
            'name' => $request->catagory_name,
        ]);
        session()->flash('success', 'Inserted successfully');
        return redirect()->back();
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
        $category = ProductType::find($id);
        return view('admin.product_type.edit', compact('category'));
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
            'catagory_name' => 'required|unique:product_types,name,' . $id,
        ]);
        ProductType::find($id)->update([
            'name' => $request->catagory_name,
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->route('product_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $services = Service::where('service_cat', $id)->get();
        // foreach ($services as $service) {
        //     $service->delete();
        // }
        ProductType::find($id)->delete();
        session()->flash('success', "Deleted Service Categoires with it's services");
        return redirect()->route('product_types.index');
    }
}
