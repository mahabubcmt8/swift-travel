<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Carbon;
use Image;
use Session;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('backend.admin.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.service.create');
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
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $service = new Service;

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;

        if($request->status == Null){
            $request->status = 0;
        }
        $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $service->status = $request->status;
        $service->created_at = Carbon::now();
        $service->save();

        $notification = array(
            'message' => 'Service Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('service.index')->with($notification);
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
        $service = Service::find($id);
        return view('backend.admin.service.edit', compact('service'));
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
        $service = Service::find($id);

        $service->icon = $request->icon;
        $service->title = $request->title;
        $service->description = $request->description;


        if($request->status == Null){
            $request->status = 0;
        }
        $service->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $service->status = $request->status;

        $service->updated_at = Carbon::now();

        $service->save();

        $notification = array(
            'message' => 'Service Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        $notification = array(
            'message' => 'Service Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){
        $service = Service::find($id);
        $service->status = 1;
        $service->save();

        $notification = array(
            'message' => 'Service Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $service = Service::find($id);
        $service->status = 0;
        $service->save();

        $notification = array(
            'message' => 'Service Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function view($id){
        $service = Service::find($id);
        return view('backend.admin.service.view', compact('service'));
    }
}
