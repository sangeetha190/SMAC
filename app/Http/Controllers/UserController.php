<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allUsers = User::where('type', 'admin')->orderBy('created_at', 'DESC')->get();
        $superAdminRole = Role::where('name', 'Super Admin')->first();



        return view('admin-dashboard.user-management.user.all-user', compact('allUsers'));
    }

    public function allCustomer()
    {
        $allCustomer = User::where('type', 'customer')->orderBy('created_at', 'DESC')->get();
        $superAdminRole = Role::where('name', 'Super Admin')->first();
        return view('admin-dashboard.user-management.customer.all-customer', compact('allCustomer'));
    }

    public function editCustomer($slug)
    {
        $user = User::find($slug);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin-dashboard.user-management.customer.edit-customer', compact('user', 'roles', 'userRole'));
    }

    public function updateCustomer(Request $request, $slug)
    {

        $updateData = [
            'status' => $request->status,
        ];
// dd($updateData);
        $user = User::find($slug);
        $user->update($updateData);

        return redirect()->route('all.customer')
            ->with('success', 'Customer updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin-dashboard.user-management.user.create-user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users',
            'roles' => 'required'

        ]);
        // dd('test');

        $input = $request->all();
        // dd($request->input('roles'));
        $input['password'] = Hash::make($input['password']);
        $input['type'] = 'admin';
        if (!empty($request['image'])) {
            $filename = $request['image']->store('Profile Images', 'public');
            $input['profile_photo_path'] = $filename;
        }
        // dd($input);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('admin-dashboard.user-management.user.edit-user', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // $this->validate($request, [
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|same:confirm_password',
        //     'roles' => 'required'
        // ]);
        $input = $request->all();


        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        if (!empty($request['image'])) {
            $filename = $request['image']->store('Profile Images', 'public');
            $input['profile_photo_path'] = $filename;
        }
        // dd($request->input('roles'));
        // $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')
            ->with('danger', 'User deleted successfully');
    }
}
