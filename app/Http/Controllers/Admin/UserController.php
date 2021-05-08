<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\UserCreateNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
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
    public function index(Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $user = Admin::all();
        $tr = Admin::with('roles', 'permissions')->onlyTrashed()->get();
        return view('Admin.user.index', compact('user', 'tr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $role = Role::all();
        return view('Admin.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $validate = $request->validate([
            'name' => 'required|unique:admins',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);
        $user->save();

        $admin = Admin::where('id', 1)->first();
        if ($admin) {
            $admin->notify(new UserCreateNotification($user));
        }

        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('users')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $user = Admin::find($id);
        $role = Role::all();
        $permission = Permission::all();
        return view('Admin.user.edit', compact('user', 'role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',

        ]);

        $user =  Admin::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);
        $user->update();
        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('users')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdestroy($id,Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $user = Admin::find($id)->delete();
        $notification = array(
            'message' => 'User Temporary Removed Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('users')->with($notification);
    }

    public function active(Admin $user, $id)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        Admin::where('id', $id)->update(['approved_at' => now(), 'email_verified_at' => now()]);
        $notification = array(
            'message' => 'User Approved Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('users')->with($notification);
    }

    public function inactive(Admin $user, $id)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        Admin::where('id', $id)->update(['approved_at' => null, 'email_verified_at' => null]);
        $notification = array(
            'message' => 'User DeActivate Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('users')->with($notification);
    }

    public function undo($id, Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $trs = Admin::withTrashed()->find($id);
        $trs->restore();
        $notification = array(
            'message' => 'User Restore Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('users')->with($notification);
    }

    public function fdelete($id, Admin $user)
    {
        if (! Gate::allows('isAdmin', $user)) {
            abort(403);
        }
        $trs = Admin::withTrashed()->find($id);
        $trs->forceDelete();
        $notification = array(
            'message' => 'User Remove Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('users')->with($notification);
    }
}
