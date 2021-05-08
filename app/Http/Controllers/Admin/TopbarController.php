<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Logo;
use App\Models\Admin\Topbar;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class TopbarController extends Controller
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
        $topbar = Topbar::get();
        return view('Admin.topbar.show', compact('topbar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topbar = Topbar::find($id);
        return view('Admin.topbar.edit', compact('topbar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'email' => 'required',
            'phone' => 'required',

        ]);
        $topbar = Topbar::find($id);
        $topbar->email = $request->email;
        $topbar->phone = $request->phone;
        $topbar->facebook = $request->facebook;
        $topbar->twitter = $request->twitter;
        $topbar->youtube = $request->youtube;
        $topbar->update();
        $notification = array(
            'message' => 'Topbar Details Updated Successfully',
            'alert-type' => 'warning',
            );
        return redirect()->route('topbar')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logo()
    {
        $logo = Logo::first();
        return view('Admin.topbar.logo', compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logoEdit($id)
    {
        $logo = Logo::find($id);
        return view('Admin.topbar.logoedit',compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logoUpdate(Request $request, $id)
    {
        
        $validated = $request->validate([
            'image' => 'required'
        ]);
        $old_image = $request->old_image;
        $logofile = $request->file('image');
        $name = hexdec(uniqid()) . '.' . $logofile->getClientOriginalExtension();
        Image::make($logofile)->resize(130, 105)->save('image/logo/' . $name);
        // unlink($old_image);
        $logoimage = 'image/logo/' . $name;
        $logo =  Logo::find($id);
        $logo->image = $logoimage;

        $logo->update();
        $notification = array(
            'message' => 'Logo Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('logo')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
