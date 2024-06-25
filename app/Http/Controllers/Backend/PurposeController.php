<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyPurpose;
use Illuminate\Support\Carbon;
use Image;

class PurposeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purposes = PropertyPurpose::latest()->get();
        return view('backend.admin.purpose.index',compact('purposes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.purpose.create');
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
            'purpose' => 'required'
        ]);

        $purpose = new PropertyPurpose;
        $purpose->purpose = $request->purpose;

        if($request->status == Null){
            $request->status = 0;
        }
        $purpose->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->purpose)));
        $purpose->status = $request->status;
        $purpose->created_at = Carbon::now();
        $purpose->save();

        $notification = array(
            'message' => 'Purpose Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.purpose.index')->with($notification);
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
        $purpose = PropertyPurpose::find($id);
        return view('backend.admin.purpose.edit', compact('purpose'));
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
        $purpose = PropertyPurpose::find($id);

        $purpose->purpose = $request->purpose;

        if($request->status == Null){
            $request->status = 0;
        }
        $purpose->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->purpose)));
        $purpose->status = $request->status;
        $purpose->updated_at = Carbon::now();
        $purpose->save();



        $notification = array(
            'message' => 'Purpose Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.purpose.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purpose = PropertyPurpose::find($id);
        $purpose->delete();

        $notification = array(
            'message' => 'Purpose Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

     public function active($id){

        $purpose = PropertyPurpose::find($id);
        $purpose->status = 1;
        $purpose->save();

        $notification = array(
            'message' => 'PropertyPurpose Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $purpose = PropertyPurpose::find($id);
        $purpose->status = 0;
        $purpose->save();

        $notification = array(
            'message' => 'Purpose Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $purpose = PropertyPurpose::find($id);
        return view('backend.admin.purpose.view', compact('purpose'));
    }
}
