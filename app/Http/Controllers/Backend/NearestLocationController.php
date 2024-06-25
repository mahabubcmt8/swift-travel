<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NearestLocation;
use Illuminate\Support\Carbon;
use Image;

class NearestLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nearestLocations = NearestLocation::latest()->get();
        return view('backend.admin.nearestLocation.index',compact('nearestLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.nearestLocation.create');
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
            'location' => 'required'
        ]);

        $nearestLocation = new NearestLocation;
        $nearestLocation->location = $request->location;

        if($request->status == Null){
            $request->status = 0;
        }
        $nearestLocation->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->location)));
        $nearestLocation->status = $request->status;
        $nearestLocation->created_at = Carbon::now();
        $nearestLocation->save();

        $notification = array(
            'message' => 'Nearstlocation Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.nearest.locations.index')->with($notification);
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
        $nearestLocation = NearestLocation::find($id);
        return view('backend.admin.nearestLocation.edit', compact('nearestLocation'));
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
        $nearestLocation = NearestLocation::find($id);

        $nearestLocation->location = $request->location;

        if($request->status == Null){
            $request->status = 0;
        }
        $nearestLocation->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->location)));
        $nearestLocation->status = $request->status;
        $nearestLocation->updated_at = Carbon::now();
        $nearestLocation->save();



        $notification = array(
            'message' => 'Nearstlocation Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.nearest.locations.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nearestLocation = NearestLocation::find($id);
        $nearestLocation->delete();

        $notification = array(
            'message' => 'Nearstlocation Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $nearestLocation = NearestLocation::find($id);
        $nearestLocation->status = 1;
        $nearestLocation->save();

        $notification = array(
            'message' => 'NearestLocation Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $nearestLocation = NearestLocation::find($id);
        $nearestLocation->status = 0;
        $nearestLocation->save();

        $notification = array(
            'message' => 'NearestLocation Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $nearestLocation = NearestLocation::find($id);
        return view('backend.admin.nearestLocation.view', compact('nearestLocation'));
    }
}
