<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view users'])->only(['index', 'affiliates']);
        $this->middleware(['permission:create users'])->only(['create']);
        $this->middleware(['permission:edit users'])->only(['edit']);
        $this->middleware(['permission:delete users'])->only(['destroy']);
    }
    /**
     *
     *  @return  all users  to get without affiliated.
     *
     *
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all()->pluck('name')->collect();
        /* ------------------ getting all roles without affiliates ------------------ */
        $rolesWithoutAffiliates = [];
        foreach ($roles as $role) {
            if ($role != "affiliated") {
                $rolesWithoutAffiliates[] = $role;
            }
        }
        return view('admin.users.index', compact('users', 'rolesWithoutAffiliates'));
    }

    /**
     *
     *  @return all users to get with affiliated.
     *
     */
    public function affiliates()
    {
        $affiliates = User::with('roles')->get();
        return view('admin.affiliates.index', ['affiliates' => $affiliates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uniqueId = Str::uuid()->toString();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "uniqueId" => $uniqueId
        ]);
        $user->syncRoles($request->role);
        session()->flash("success", 'Successfully created an account');
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
        if (Auth::user()->id != $id) {
            $roles = Role::all();
            $user = User::find($id);
            $hasRoles = $user->roles->pluck('name');
            $title = "Edit user";
            return view('admin.users.edit-user', compact('title', 'roles', 'user', 'hasRoles'));
        } else {
            session()->flash('success', "You're not allowed to edit your own role");
            return redirect()->route('roles.index');
        }
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            "status" => ["required"],
            "role" => ["required"]
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status,
            'password' => Hash::make($request->password),
        ]);
        $user->syncRoles($request->role);
        session()->flash("success", 'Successfully updated an user');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id != $id) {


            if (!(is_null($id))) {
                $product = User::find($id);
                $product->delete();
                session()->flash('success', 'Moved to trash successfully');
            }
            return redirect()->back();
        } else {
            session()->flash('success', "You're not allowed to delete your own role");
            return redirect()->route('roles.index');
        }
    }
}
