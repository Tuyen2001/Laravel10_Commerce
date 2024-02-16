<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class UserSpatieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'add product']);
        $user = User::with('roles','permissions')->get();
        // dd($user);

        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect()->back()->with('success', 'Thêm user thành công');
    }

    public function vaitro($id)
    {

        $user = User::find($id);
        // $name_roles = $user->roles->first()->name;
        $role = Role::orderBy('id', 'DESC')->get();
        $permission = Permission::orderBy('id', 'DESC')->get();
        $all_column_roles = $user->roles->first(); //
        return view('admin.user.vaitro', compact('user', 'role', 'all_column_roles', 'permission'));
    }

    public function phanquyen($id)
    {

        $user = User::find($id);
        // $name_roles = $user->roles->first()->name;
        // $role = Role::orderBy('id','DESC')->get();
        $permission = Permission::orderBy('id', 'DESC')->get();
        $name_roles = $user->roles->first()->name; //
        $get_permission_via_roles = $user->getPermissionsViaRoles();
        // dd($get_permission_via_roles);
        return view('admin.user.phanquyen', compact('user', 'name_roles', 'permission', 'get_permission_via_roles'));
    }

    public function insert_roles(Request $request, $id)
    {
        // dd($data);
        $data = $request->all();
        $user = User::find($id);
        $user->syncRoles($data['role']);
        $role_id = $user->roles->first()->id;

        return redirect()->back()->with('success', 'Thêm vai trò thành công');
    }

    public function insert_permission_id(Request $request, $id)
    {
        $data = $request->all();
        $user = User::find($id);
        $role_id = $user->roles->first()->id;
        $role = Role::find($role_id);
        // dd($data['permission']);
        $role->syncPermissions($data['permission']);




        return redirect()->back()->with('success', 'Thêm vai trò thành công');
    }


    public function  insert_permission(Request $request)
    {
        $data = $request->all();
        $permission = new Permission();
        $permission->name = $data['permission'];
        $permission->save();
        return redirect()->back()->with('success', 'Thêm quyền thành công');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
