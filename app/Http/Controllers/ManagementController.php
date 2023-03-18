<?php

namespace App\Http\Controllers;

use App\Models\Management;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ManagementController extends Controller
{
    public function __construct()
    {   
       $this->middleware('auth'); 
    }
    public function Management(){
        $management = Management::latest()->get();
        return view('admin.management.index',compact('management'));
    }
    public function AddManagement(){
        return view('admin.management.add');
    }
    public function StoreManagement(Request $request){
        $validated = $request->validate([
            'name'      => 'required|min:5',
            'title'     => 'required',
            'phone'     => 'required|min:11',
            'mail'      => 'required|min:10',
            'image'     => 'required|mimes:jpg,jpeg,png'
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,300)->save('image/team/'.$name_gen);
        
        $last_img = 'image/team/'.$name_gen;

        Management::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('about.management')->with('success','Membar inserted successfully');
    }
    public function Edit($id){
        $mmt = Management::find($id);
        return view('admin.management.edit',compact('mmt'));
    }
    public function Update(Request $request,$id){
        $old_image = $request->old_image;
        $image     = $request->image;

        if($image){
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(370,300)->save('image/team/'.$name_gen);
            
            $last_img = 'image/team/'.$name_gen;
            unlink($old_image);

            Management::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at'=> Carbon::now()
            ]);
            return redirect()->route('about.management')->with('success','Membar Updated successfully');
        }else{
            Management::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at'=> Carbon::now()
            ]);
            return redirect()->route('about.management')->with('success','Membar Updated successfully');
        }
    }
    public function Delete($id){
        $image = Management::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Management::find($id)->delete();
        return redirect()->back()->with('success','Membar Deleted successfully');
    }
}
