<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Jenssegers\Agent\Agent;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    public function show()
    {
        $agent = new Agent();
        $devices = DB::table('sessions')
            ->where('user_id', Auth::user()->id)
            ->get()->reverse();
        return view('Admin.Profile.profile', compact('agent'))->with('devices', $devices)
            ->with('current_session_id', Session::getId());
    }

    public function update(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'profile_photo_path' => 'nullable|mimes:png,jpg|max:1024'
        ]);
        $old_image = $request->old_image;
        $image = $request->file('profile_photo_path');
        if ($image) {

            $name  = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(64, 64)->save('image/profile/' . $name);
            $profile_image = 'image/profile/' . $name;
        }
        $profile =  Admin::find(Auth::id());
        $profile->name = $request->name;
        $profile->email = $request->email;
        if ($image) {

            $profile->profile_photo_path = $profile_image;
        }
        $profile->update();
        $notification = array(
            'message' => 'User Information Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => 'required|confirmed|string',
        ]);
        $password = Auth::user()->password;
        if (isset($request->current_password) && Hash::check($request->current_password, $password)) {
            $pass = Admin::find(Auth::id());
            $pass->password = Hash::make($request->password);
            $pass->update();
            Auth::logout();
            $notification = array(
                'message' => 'Your Password Changed Successfully ! Please Login With Your New Credential !',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Somthing went wrong !',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logoutOtherDevices(Request $request)
    {
        $request->validate([
            'current_password' => 'required|min:8'
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors([
                'current_password' => ['The provided password does not match our records.']
            ]);
        }
        Auth::logoutOtherDevices($request->current_password);
        $this->deleteOtherSessionRecords();

        $notification = array(
            'message' => 'Other Devices Session Delete Successfully !',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }


    /**
     * Delete the other browser session records from storage.
     *
     * @return void
     */
    protected function deleteOtherSessionRecords()
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }
}
