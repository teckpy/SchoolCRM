<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all(); 
        return view('Admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('Admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'role' => 'required|unique:roles',
            'permission' => 'required'
        ]);

        $role = new Role();
        $role->role = $request->role;
        $role->save();
        $role->syncPermissions($request->permission);
        $notification = array(
            'message' => 'Role Creaate Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('role')->with($notification);

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
        $role = Role::find($id);
        $permission = Permission::all();
        return view('Admin.role.edit',compact('role','permission'));
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
        $validate = $request->validate([
            'role' => 'required',
            'permission' => 'required'
        ]);

        $role =  Role::find($id);
        $role->role = $request->role;
        $role->update();
        $role->syncPermissions($request->permission);
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('role')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $permission = Role::permission($id)->get();
        $role = Role::find($id)->delete();
        // $role->revokePermissionTo($permission);
        $notification = array(
            'message' => 'Role Reomove Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('role')->with($notification);
    }
}
