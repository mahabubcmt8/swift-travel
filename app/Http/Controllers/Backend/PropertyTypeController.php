<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTypes = PropertyType::all();
        return view('backend.admin.property-type.index',compact('propertyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.property-type.create');
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
            'type' => 'required',
        ]);

        $type = new PropertyType();
        $type->type = $request->type;
        $type->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->type)));

        if($request->status == Null){
            $request->status = 0;
        }

        $type->status = $request->status;
        $type->save();

        $notification = array(
            'message' => 'PropertyType Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property-type.index')->with($notification);



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
        $propertyType = PropertyType::find($id);
        return view('backend.admin.property-type.edit', compact('propertyType'));
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
        $type = PropertyType::find($id);
        $type->type = $request->type;
        $type->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->type)));

        if($request->status == Null){
            $request->status = 0;
        }

        $type->updated_at = Carbon::now();

        $type->save();

        $notification = array(
            'message' => 'PropertyType Updated Successfully.', 
            'alert-type' => 'success'
        );

        $type->status = $request->status;
        $type->save();

        return redirect()->route('property-type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = PropertyType::find($id);
        $type->delete();

        $notification = array(
            'message' => 'PropertyType Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){
        $type = PropertyType::find($id);
        $type->status = 1;
        $type->save();

        $notification = array(
            'message' => 'PropertyType Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $type = PropertyType::find($id);
        $type->status = 0;
        $type->save();

        $notification = array(
            'message' => 'PropertyType Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function view($id){
        $type = PropertyType::find($id);
        return view('backend.admin.property-type.view', compact('type'));
    }
}
