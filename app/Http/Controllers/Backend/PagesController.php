<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Illuminate\Support\Carbon;
use Session;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        return view('backend.admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $pages = new Pages();
        $pages->title = $request->title;

        $pages->name = $request->name;
        $pages->description = $request->description;

        $pages->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        if($request->status == Null){
            $request->status = 0;
        }
        $pages->status = $request->status;
        $pages->position = $request->position;
        $pages->created_at = Carbon::now();

        $pages->save();

        $notification = array(
            'message' => 'Pages Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('pages.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Pages::find($id);
        return view('backend.admin.pages.view',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Pages::find($id);
        return view('backend.admin.pages.edit',compact('page'));
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
        $pages = Pages::find($id);
        $pages->title = $request->title;

        $pages->name = $request->name;
        $pages->description = $request->description;

        $pages->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        if($request->status == Null){
            $request->status = 0;
        }
        $pages->status = $request->status;
        $pages->position = $request->position;
        $pages->created_at = Carbon::now();

        $pages->save();

        $notification = array(
            'message' => 'Pages Updated Successfull.', 
            'alert-type' => 'success'
        );
        return redirect()->route('pages.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        $page->delete();

        $notification = array(
            'message' => 'Pages Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){
        $page = Pages::find($id);
        $page->status = 1;
        $page->save();

        $notification = array(
            'message' => 'Pages Active Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $page = Pages::find($id);
        $page->status = 0;
        $page->save();

        $notification = array(
            'message' => 'Pages Disabled Successfully.', 
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
