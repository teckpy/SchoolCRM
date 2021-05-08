<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
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
        $vision = Vision::all();
        return view('Admin.vision.index', compact('vision'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $vision = Vision::find($id);
        return view('Admin.vision.edit', compact('vision'));
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
            'body' => 'required',
        ]);
        $vision = Vision::find($id);
        $vision->body = $request->body;
        $vision->status = $request->status;
        $vision->update();
        $notification = array(
            'message' => 'Vision Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('vision')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vision::find($id)->delete();
        $notification = array(
            'message' => 'Vision UnPublished Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('vision')->with($notification);
    }

    public function unpublish($id)
    {
        $unpublish = Vision::where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Vision UnPublished Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('vision')->with($notification);
    }
    public function publish($id)
    {
        $unpublish = Vision::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Vision Published Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('vision')->with($notification);
    }
}
