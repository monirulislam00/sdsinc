<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Team()
    {
        $teams = Team::latest()->get();
        return view('admin.director.index', compact('teams'));
    }
    public function AddTeam()
    {
        return view('admin.director.addteam');
    }
    public function StoreTeam(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|min:5',
            'title'     => 'required',
            'phone'     => 'required|min:11',
            'mail'      => 'required|min:10',
            'image'     => 'required|mimes:jpg,jpeg,png'
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

        $last_img = 'image/team/' . $name_gen;

        Team::insert([
            'name'      => $request->name,
            'title'     => $request->title,
            'company'   => $request->company,
            'phone'     => $request->phone,
            'mail'      => $request->mail,
            'image'     => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('about.team')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $team = Team::find($id);
        return view('admin.director.edit', compact('team'));
    }
    public function Update(Request $request, $id)
    {
        $old_image = $request->old_image;
        $image     = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

            $last_img = 'image/team/' . $name_gen;
            unlink($old_image);

            Team::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'image'     => $last_img,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.team')->with('success', 'Membar Updated successfully');
        } else {
            Team::find($id)->update([
                'name'      => $request->name,
                'title'     => $request->title,
                'company'   => $request->company,
                'phone'     => $request->phone,
                'mail'      => $request->mail,
                'created_at' => Carbon::now()
            ]);
            return redirect()->route('about.team')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = Team::find($id);
        $old_image = $image->image;
        unlink($old_image);
        Team::find($id)->delete();
        return redirect()->back()->with('success', 'Member Deleted successfully');
    }
}
