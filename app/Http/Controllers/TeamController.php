<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\TeamMember;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view teams'])->only(['ViewDepartment']);
        $this->middleware(['permission:create teams'])->only(['AddDepartment']);
        $this->middleware(['permission:edit teams'])->only(['EditDepartment']);
        $this->middleware(['permission:delete teams'])->only(['DeleteDepartment']);

        $this->middleware(['permission:view teams'])->only(['ViewTeam']);
        $this->middleware(['permission:create teams'])->only(['AddTeam']);
        $this->middleware(['permission:edit teams'])->only(['Edit']);
        $this->middleware(['permission:delete teams'])->only(['Delete']);
    }
    public function ViewDepartment()
    {
        $departments = Department::latest()->get();
        return view('admin.department.index', compact('departments'));
    }
    public function AddDepartment(Request $request)
    {
        $validated = $request->validate([
            'department_name' => 'required'
        ]);
        Department::insert([
            'department_name' => $request->department_name,
            'created_at' => Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Department inserted successfully');
    }
    public function EditDepartment($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }
    public function UpdateDepartment(Request $request, $id)
    {
        Department::find($id)->update([
            'department_name' => $request->department_name,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('view.department')->with('success', 'Department Updated successfully');

    }
    public function DeleteDepartment($id)
    {
        Department::find($id)->delete();
        return redirect()->back()->with('success', 'Department Deleted successfully');
    }


    public function ViewTeam()
    {
        $teams = TeamMember::latest()->get();
        return view('admin.team.index', compact('teams'));
    }
    public function AddTeam()
    {
        $departments = Department::get()->all();
        return view('admin.team.addteam', compact('departments'));
    }
    public function StoreTeam(Request $request)
    {
        $validated = $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required|min:11|unique:team_members',
            'email' => 'required|unique:team_members',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

        $last_img = 'image/team/' . $name_gen;

        TeamMember::insert([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'designation' => $request->designation,
            'company' => $request->company,
            'description' => $request->description,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return redirect()->route('view.team')->with('success', 'Membar inserted successfully');
    }
    public function Edit($id)
    {
        $team = TeamMember::find($id);
        $departments = Department::get()->all();
        return view('admin.team.edit', compact('team', 'departments'));
    }
    public function Update(Request $request, $id)
    {
        $validated = $request->validate([
            'department_id' => 'required'
        ]);
        $old_image = $request->old_image;
        $image = $request->image;

        if ($image) {
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 300)->save('image/team/' . $name_gen);

            $last_img = 'image/team/' . $name_gen;
            unlink($old_image);

            TeamMember::find($id)->update([
                'department_id' => $request->department_id,
                'name' => $request->name,
                'designation' => $request->designation,
                'company' => $request->company,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
                'image' => $last_img,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->route('view.team')->with('success', 'Membar Updated successfully');
        } else {
            TeamMember::find($id)->update([
                'department_id' => $request->department_id,
                'name' => $request->name,
                'designation' => $request->designation,
                'company' => $request->company,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
                'updated_at' => Carbon::now()
            ]);
            return redirect()->route('view.team')->with('success', 'Membar Updated successfully');
        }
    }
    public function Delete($id)
    {
        $image = TeamMember::find($id);
        $old_image = $image->image;
        unlink($old_image);
        TeamMember::find($id)->delete();
        return redirect()->back()->with('success', 'Member Deleted successfully');
    }
}