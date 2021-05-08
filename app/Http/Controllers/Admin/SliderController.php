<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
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
        $slider = Slider::all();
        return view('Admin.slider.slider', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.slider.add');
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
            'title' => 'required|unique:sliders',
            'image' => 'required|unique:sliders',
        ]);
        $image = $request->file('image');
        $name  = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1200)->save('image/slider/' . $name);
        $slider_image = 'image/slider/' . $name;
        $slider = new Slider();
        $slider->image = $slider_image;
        $slider->title = $request->title;
        $slider->status = $request->status;
        $slider->save();
        $notification = array(
            'alert-type' => 'success',
            'message' => 'Slider Inserted Successfully',
        );
        return redirect()->route('slider')->with($notification);
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
        $slider = Slider::find($id);
        return view('Admin.slider.edit', compact('slider'));
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
            'title' => 'required|unique:sliders',
            'image' => 'required|unique:sliders',
        ]);
        $old_image = $request->old_image;
        $image = $request->file('image');
        $name  = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(1920, 1200)->save('image/slider/' . $name);
        
        $slider_image = 'image/slider/' . $name;
        $slider = Slider::find($id);
        $slider->image = $slider_image;
        $slider->title = $request->title;
        $slider->status = $request->status;
        $slider->update();
        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('slider')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::where('id', $id)->first();
        $image = $slider->image;
        unlink($image);
        Slider::where('id', $id)->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error',
        );
        return redirect()->route('slider')->with($notification);
    }
    public function publish($id, Admin $user)
    {

        $publish = Slider::where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Published Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('slider')->with($notification);
    }

    public function unpublish($id, Admin $user)
    {


        $publish = Slider::where('id', $id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider UnPublished Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('slider')->with($notification);
    }
}
