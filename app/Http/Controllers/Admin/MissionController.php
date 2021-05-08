<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
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
        $mission = Mission::all();
        return view('Admin.mission.index', compact('mission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.mission.mission');
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
        $mission = Mission::find($id);
        return view('Admin.mission.mission', compact('mission'));
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
        $mission = Mission::find($id);
        $mission->body = $request->body;
        $mission->status = $request->status;
        $mission->update();
        $notification = array(
            'message' => 'Mission Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('mission')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mission::find($id)->delete();
        $notification = array(
            'message' => 'Mission Update Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('mission')->with($notification);
    }
    public function unpublish($id)
    {
        $unpublish = Mission::where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Mission UnPublished Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('mission')->with($notification);
    }
    public function publish($id)
    {
        $unpublish = Mission::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Mission Published Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('mission')->with($notification);
    }



}
