<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
use Session;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('backend.admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.admin.blog.create',compact('blogCategory'));
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
            'title' =>'required',
            'blog_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'category'=>'required',
            'blog_description'=>'required',
            'status'=>'required',
            'show_homepage'=>'required',
        ]);

        if($request->hasfile('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1700)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = $request->blog_images;
        }

        // $admin = Auth::guard('web')->user()->id;
        // dd($admin);

        $blog = new Blog;

        $blog->admin_id         = 1;
        $blog->title            = $request->title;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $blog->blog_category_id =$request->category;
        $blog->description =$request->blog_description;

        if($request->status == Null){
            $request->status = 0;
        }

        if($request->show_homepage == Null){
            $request->show_homepage = 0;
        }

        $blog->status = $request->status;
        $blog->created_by = 1;
        $blog->show_homepage = $request->show_homepage;
        $blog->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $blog->seo_description = $request->seo_description ? $request->seo_description : $request->title;

        $blog->blog_image = $blog_image;
        $blog->created_at = Carbon::now();
        $blog->save();
        
        $notification = array(
            'message' => 'Blog Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog.index')->with($notification);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.admin.blog.edit', compact('blog','blogCategory'));


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
        $blog = Blog::find($id);

        if($request->hasfile('blog_image')){
            try {
                if(file_exists($blog->blog_image)){
                    unlink($blog->blog_image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1200,1700)->save('upload/blog/'.$name_gen);
            $blog_image = 'upload/blog/'.$name_gen;
        }else{
            $blog_image = $blog->blog_image;
        }

        $admin = Auth::guard('web')->user();
        $blog->admin_id         = $admin->id;
        $blog->title            = $request->title;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $blog->blog_category_id =$request->category;
        $blog->description =$request->blog_description;

        if($request->status == Null){
            $request->status = 0;
        }

        if($request->show_homepage == Null){
            $request->show_homepage = 0;
        }

        $blog->status = $request->status;
        $blog->created_by = 2;
        $blog->show_homepage = $request->show_homepage;
        $blog->seo_title = $request->seo_title ? $request->seo_title : $request->title;
        $blog->seo_description = $request->seo_description ? $request->seo_description : $request->title;

        $blog->blog_image = $blog_image;

        $blog->updated_at = Carbon::now();

        $blog->save();

        $notification = array(
            'message' => 'Blog Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog_image = $blog->blog_image;
        unlink($blog_image);
        $blog->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);

    }

    public function active($id){

        $blog = Blog::find($id);
        $blog->status = 1;
        $blog->save();

        $notification = array(
            'message' => 'Blog Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $blog = Blog::find($id);
        $blog->status = 0;
        $blog->save();

        $notification = array(
            'message' => 'Blog Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $blog = Blog::find($id);
        return view('backend.admin.blog.view', compact('blog'));
    }
}
