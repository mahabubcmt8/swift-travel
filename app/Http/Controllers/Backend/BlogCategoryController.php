<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Image;
use Session;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('backend.admin.blogCategory.index',compact('blogCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.blogCategory.create');
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
            'name' => 'required'
        ]);


        $blogCategory = new BlogCategory;

        $blogCategory->name = $request->name;

        if($request->status == Null){
            $request->status = 0;
        }
        $blogCategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $blogCategory->status = $request->status;
        $blogCategory->created_at = Carbon::now();
        $blogCategory->save();

        $notification = array(
            'message' => 'BlogCategory Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category.index')->with($notification);
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
        $blogCategory = BlogCategory::find($id);
        return view('backend.admin.blogCategory.edit', compact('blogCategory'));
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
        $blogCategory = BlogCategory::find($id);

        $blogCategory->name = $request->name;


        if($request->status == Null){
            $request->status = 0;
        }
        $blogCategory->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $blogCategory->status = $request->status;

        $blogCategory->updated_at = Carbon::now();

        $blogCategory->save();

        $notification = array(
            'message' => 'BlogCategory Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('blog.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();

        $notification = array(
            'message' => 'BlogCategory Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $blogCategory = BlogCategory::find($id);
        $blogCategory->status = 1;
        $blogCategory->save();

        $notification = array(
            'message' => 'BlogCategory Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $blogCategory = BlogCategory::find($id);
        $blogCategory->status = 0;
        $blogCategory->save();

        $notification = array(
            'message' => 'BlogCategory Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $blogCategory = BlogCategory::find($id);
        return view('backend.admin.blogCategory.view', compact('blogCategory'));
    }
}
