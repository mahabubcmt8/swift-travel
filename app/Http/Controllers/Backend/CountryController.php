<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Carbon;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countrys = Country::latest()->get();
        return view('backend.admin.location.country.index',compact('countrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.location.country.create');
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

        $country = new Country;
        $country->name = $request->name;

        if($request->status == Null){
            $request->status = 0;
        }
        $country->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $country->status = $request->status;
        $country->created_at = Carbon::now();
        $country->save();

        $notification = array(
            'message' => 'Country Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.country.index')->with($notification);
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
        $country = Country::find($id);
        return view('backend.admin.location.country.edit', compact('country'));
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
        $country = Country::find($id);

        $country->name = $request->name;

        if($request->status == Null){
            $request->status = 0;
        }
        $country->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $country->status = $request->status;
        $country->updated_at = Carbon::now();
        $country->save();

        $notification = array(
            'message' => 'Country Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.country.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        $notification = array(
            'message' => 'Country Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $country = Country::find($id);
        $country->status = 1;
        $country->save();

        $notification = array(
            'message' => 'Country Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $country = Country::find($id);
        $country->status = 0;
        $country->save();

        $notification = array(
            'message' => 'Country Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $country = Country::find($id);
        return view('backend.admin.location.country.view', compact('country'));
    }
}
