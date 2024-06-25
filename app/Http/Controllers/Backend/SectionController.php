<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Carbon;
use Session;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::latest()->get();
        return view('backend.admin.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.section.create');
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
            'name'=>'required',
            'title'=>'required'
        ]);

        $section = new Section();

        $section->name = $request->name;
        $section->title = $request->title;


        if($request->status == Null){
            $request->status = 0;
        }

        $section->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));

        $section->status = $request->status;
        $section->created_at = Carbon::now();

        $section->save();

        $notification = array(
            'message' => 'Section Inserted Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('section.index')->with($notification);
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
        $section = Section::find($id);
        return view('backend.admin.section.edit', compact('section'));
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
        $section = Section::find($id);

        $section->name = $request->name;
        $section->title = $request->title;


        if($request->status == Null){
            $request->status = 0;
        }

        $section->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));

        $section->status = $request->status;

        $section->updated_at = Carbon::now();

        $section->save();

        $notification = array(
            'message' => 'Section Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('section.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();

        $notification = array(
            'message' => 'Section Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $section = Section::find($id);
        $section->status = 1;
        $section->save();

        $notification = array(
            'message' => 'Section Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $section = Section::find($id);
        $section->status = 0;
        $section->save();

        $notification = array(
            'message' => 'Section Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $section = Section::find($id);
        return view('backend.admin.section.view', compact('section'));
    }
}
