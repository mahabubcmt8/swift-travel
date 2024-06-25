<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\CountryState;
use Illuminate\Support\Carbon;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = CountryState::latest()->get();
        return view('backend.admin.location.state.index',compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $country = Country::latest()->get();
        return view('backend.admin.location.state.create', compact('country'));
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

        $countryState = new CountryState;
        $countryState->name = $request->name;
        $countryState->country_id = $request->country_id;

        if($request->status == Null){
            $request->status = 0;
        }
        $countryState->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $countryState->status = $request->status;
        $countryState->created_at = Carbon::now();
        $countryState->save();

        $notification = array(
            'message' => 'CountryState Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.state.index')->with($notification);
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
        $countryState = CountryState::find($id);
        $country = Country::latest()->get();
        return view('backend.admin.location.state.edit', compact('countryState','country'));
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
        $countryState = CountryState::find($id);

        $countryState->name = $request->name;
        $countryState->country_id = $request->country_id;

        if($request->status == Null){
            $request->status = 0;
        }
        $countryState->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $countryState->status = $request->status;
        $countryState->updated_at = Carbon::now();
        $countryState->save();

        $notification = array(
            'message' => 'CountryState Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('location.state.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countryState = CountryState::find($id);
        $countryState->delete();

        $notification = array(
            'message' => 'CountryState Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $countryState = CountryState::find($id);
        $countryState->status = 1;
        $countryState->save();

        $notification = array(
            'message' => 'CountryState Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $countryState = CountryState::find($id);
        $countryState->status = 0;
        $countryState->save();

        $notification = array(
            'message' => 'CountryState Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $countryState = CountryState::find($id);
        return view('backend.admin.location.state.view', compact('countryState'));
    }
}
