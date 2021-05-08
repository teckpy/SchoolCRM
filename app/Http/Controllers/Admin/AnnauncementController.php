<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Annauncement;
use Illuminate\Http\Request;

class AnnauncementController extends Controller
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
        $annauncement = Annauncement::all();
        return view('Admin.annauncement.index', compact('annauncement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.annauncement.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $filename = $request->file->getclientOriginalName();
            $mainfile = $request->file->storeAs('public/Annauncement', $filename);
        } else {
            return 'no file are selected';
        }

        // $file = $request->file('file');
        // $name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        // $filepath = 'file/Annauncement/'.$name;
        // $file->move($filepath,$name);
        $annauncement = new Annauncement();
        $annauncement->title = $request->title;
        $annauncement->status = $request->status;
        $annauncement->file = $mainfile;
        $annauncement->link = $request->link;
        $annauncement->save();
        $notification = array(
            'message' => 'Annauncement Create Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('annauncement')->with($notification);
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
        $annauncement = Annauncement::find($id);
        return view('Admin.annauncement.edit', compact('annauncement'));
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
        $validated = $request->validate([
            'title' => 'required',
        ]);
        $old_file = $request->old_file;
        if ($request->hasFile('file')) {
            $filename = $request->file->getclientOriginalName();

            $mainfile = $request->file->storeAs('public/Annauncement', $filename);
        } else {
            return 'no file are selected';
        }

        // $file = $request->file('file');
        // $name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
        // $filepath = 'file/Annauncement/'.$name;
        // $file->move($filepath,$name);

        $annauncement =  Annauncement::find($id);
        $annauncement->title = $request->title;
        $annauncement->file = $mainfile;
        $annauncement->status = $request->status;
        $annauncement->link = $request->link;
        $annauncement->update();
        $notification = array(
            'message' => 'Annauncement Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('annauncement')->with($notification);
    }
    public function unpublish($id)
    {
        $unpublish = Annauncement::where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Annauncement UnPublished Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('annauncement')->with($notification);
    }
    public function publish($id)
    {
        $unpublish = Annauncement::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Annauncement Published Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('annauncement')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Annauncement::where('id', $id)->delete();
        $notification = array(
            'message' => 'Annauncement Deleted Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('annauncement')->with($notification);
    }
}
