<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Carbon;
use Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('backend.admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'experience_no' => 'required',
            'experience_title' => 'required',
            'about_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required',
        ]);

        if($request->hasfile('about_image')){
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(577,718)->save('upload/about/'.$name_gen);
            $about_image = 'upload/about/'.$name_gen;
        }else{
            $about_image = $request->about_image;
        }

        $about = new About;
        $about->name = $request->name;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->about_btn = $request->about_btn;
        $about->video_link = $request->video_link;

        if($request->status == Null){
            $request->status = 0;
        }
        $about->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $about->status = $request->status;
        $about->about_image = $about_image;
        $about->created_at = Carbon::now();
        $about->save();

        $notification = array(
            'message' => 'About Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('about.index')->with($notification);
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
        $about = About::find($id);
        return view('backend.admin.about.edit', compact('about'));
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
        $this->validate($request, [
            'title' => 'required',
            'experience_no' => 'required',
            'experience_title' => 'required',
            'about_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $about = About::find($id);

        if($request->hasfile('about_image')){
            try {
                if(file_exists($about->image)){
                    unlink($about->image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(577,718)->save('upload/about/'.$name_gen);
            $about_image = 'upload/about/'.$name_gen;
        }else{
            $about_image = $about->about_image;
        }

        $about->title = $request->title;
        $about->experience_no = $request->experience_no;
        $about->experience_title = $request->experience_title;
        $about->description = $request->description;


        if($request->status == Null){
            $request->status = 0;
        }
        $about->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $about->status = $request->status;
        $about->image = $about_image ;

        $about->updated_at = Carbon::now();

        $about->save();

        $notification = array(
            'message' => 'About Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        $about_image = $about->about_image;
        unlink($about_image);
        $about->delete();

        $notification = array(
            'message' => 'About Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $about = About::find($id);
        $about->status = 1;
        $about->save();

        $notification = array(
            'message' => 'About Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $about = About::find($id);
        $about->status = 0;
        $about->save();

        $notification = array(
            'message' => 'About Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $about = About::find($id);
        return view('backend.admin.about.view', compact('about'));
    }
}
