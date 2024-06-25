<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\CountryState;
use Illuminate\Support\Carbon;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys = City::latest()->get();
        return view('backend.admin.location.city.index',compact('citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = CountryState::latest()->get();
        return view('backend.admin.location.city.create', compact('states'));
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

        $city = new City;
        $city->name = $request->name;
        $city->country_state_id  = $request->country_state_id  ;

        if($request->status == Null){
            $request->status = 0;
        }
        $city->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $city->status = $request->status;
        $city->created_at = Carbon::now();
        $city->save();

        $notification = array(
            'message' => 'City Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.city.index')->with($notification);
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
        // dd($id);
        $city = City::find($id);
        $countryState = CountryState::all();
        return view('backend.admin.location.city.edit', compact('countryState','city'));
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
        $city = City::find($id);

        $city->name = $request->name;
        $city->country_state_id = $request->country_state_id;

        if($request->status == Null){
            $request->status = 0;
        }
        $city->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $city->status = $request->status;
        $city->updated_at = Carbon::now();
        $city->save();

        $notification = array(
            'message' => 'City Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.city.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();

        $notification = array(
            'message' => 'City Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $city = City::find($id);
        $city->status = 1;
        $city->save();

        $notification = array(
            'message' => 'City Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $city = City::find($id);
        $city->status = 0;
        $city->save();

        $notification = array(
            'message' => 'City Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $city = City::find($id);
        return view('backend.admin.location.city.view', compact('city'));
    }
}
