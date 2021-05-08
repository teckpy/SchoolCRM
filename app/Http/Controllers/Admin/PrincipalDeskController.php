<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Principaldesk;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PrincipalDeskController extends Controller
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
        $principal = Principaldesk  ::first();
        return view('Admin.principal.index', compact('principal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.principal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $principal = Principaldesk::find($id);
        return view('Admin.principal.edit', compact('principal'));
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
        $validation = $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'body' => 'required'
        ]);

        $image = $request->file('image');
        $old_image = $request->old_image;
        $name  = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(193, 263)->save('image/principal/' . $name);
        // unlink($old_image);
        $principal_image = 'image/principal/' . $name;
        $principal =  Principaldesk::find($id);
        $principal->image = $principal_image;
        $principal->name = $request->name;
        $principal->designation = $request->designation;
        $principal->status = $request->status;
        $principal->body = $request->body;
        $principal->update();
        $notification = array(
            'message' => 'Principal Details Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('principal')->with($notification);
    }
    public function unpublish($id)
    {
        $unpublish = Principaldesk::where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Principal UnPublished Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('principal')->with($notification);
    }
    public function publish($id)
    {
        $unpublish = Principaldesk::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Principal Published Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('principal')->with($notification);
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
