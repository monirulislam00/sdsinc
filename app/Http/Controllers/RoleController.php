<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:view roles'])->only('index');
        $this->middleware(['permission:create roles'])->only(['create']);
        $this->middleware(['permission:edit roles'])->only(['edit']);
        $this->middleware(['permission:delete roles'])->only(['destroy']);
    }
    public function index(User $user)
    {
        $roles = Role::with('permissions')->latest()->get();
        return view('admin.roles.index')->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        $data = compact('permissions');
        return view('admin.roles.create-role')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        validator($request->all(), [
            'name' => ['required', 'unique:roles,name'],
        ])->validate();
        $role = Role::create(['name' => $request->name]);
        $permissions = $role->syncPermissions($request->permissions);
        session()->flash('success', 'Successfully role created');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::with('permissions')->find($id);
        $hasPermission = $role->permissions->pluck('name');
        return response()->json(['data' => $hasPermission]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($id);
        $hasPermission = $role->permissions->pluck('id');
        return view('admin.roles.update-role')->with(compact('role', 'permissions', 'hasPermission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        validator($request->all(), [
            'name' => ['required', 'unique:roles,name,' . $id],
        ])->validate();
        $role = Role::find($id);
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        session()->flash('success', 'Successfully role updated');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!(is_null($id))) {
            $product = Role::find($id);
            $product->delete();
            session()->flash('success', 'Moved to trash successfully');
        }
        return redirect()->back();
    }
}
