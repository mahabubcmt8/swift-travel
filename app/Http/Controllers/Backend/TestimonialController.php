<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Image;
use Session;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required',
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,120)->save('upload/testimonial/'.$name_gen);
            $image = 'upload/testimonial/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $testimonial = new Testimonial;

        $testimonial->name            = $request->name;
        $testimonial->designation     = $request->designation;
        $testimonial->description     = $request->description;
     

        if($request->status == Null){
            $request->status = 0;
        }
        $testimonial->status = $request->status;
        $testimonial->image = $image;
        $testimonial->created_at = Carbon::now();
        $testimonial->save();

        $notification = array(
            'message' => 'Testimonial Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('testimonial.index')->with($notification);
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
        $testimonial = Testimonial::find($id);
        return view('backend.admin.testimonial.edit', compact('testimonial'));
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
        $testimonial = Testimonial::find($id);

        if($request->hasfile('image')){
            try {
                if(file_exists($testimonial->image)){
                    unlink($testimonial->image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(120,120)->save('upload/testimonial/'.$name_gen);
            $image = 'upload/testimonial/'.$name_gen;
        }else{
            $image = $testimonial->image;
        }

        $testimonial->name            = $request->name;
        $testimonial->designation     = $request->designation;
        $testimonial->description     = $request->description;
       


        if($request->status == Null){
            $request->status = 0;
        }
        $testimonial->status = $request->status;
        $testimonial->image = $image ;

        $testimonial->updated_at = Carbon::now();

        $testimonial->save();

        $notification = array(
            'message' => 'Testimonial Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('testimonial.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $image = $testimonial->image;
        unlink($image);
        $testimonial->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $testimonial = Testimonial::find($id);
        $testimonial->status = 1;
        $testimonial->save();

        $notification = array(
            'message' => 'Testimonial Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $testimonial = Testimonial::find($id);
        $testimonial->status = 0;
        $testimonial->save();

        $notification = array(
            'message' => 'Testimonial Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $testimonial = Testimonial::find($id);
        return view('backend.admin.testimonial.view', compact('testimonial'));
    }
}
