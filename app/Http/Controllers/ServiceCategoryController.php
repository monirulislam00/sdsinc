<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view service'])->only(['index']);
        $this->middleware(['permission:create service'])->only(['store']);
        $this->middleware(['permission:edit service'])->only(['edit']);
        $this->middleware(['permission:delete service'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serviceCategories.create');
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
        ServiceCategory::insert([
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
        $category = ServiceCategory::find($id);
        return view('admin.serviceCategories.edit', compact('category'));
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
            'catagory_name' => 'required|unique:service_categories,name,' . $id,
        ]);
        ServiceCategory::find($id)->update([
            'name' => $request->catagory_name,
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::where('service_cat', $id)->get();
        foreach ($services as $service) {
            $service->delete();
        }
        ServiceCategory::find($id)->delete();
        session()->flash('success', "Deleted Service Categoires with it's services");
        return redirect()->route('service.index');
    }
}
