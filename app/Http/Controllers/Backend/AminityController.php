<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aminity;
use Illuminate\Support\Carbon;

class AminityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aminitys = Aminity::latest()->get();
        return view('backend.admin.aminity.index',compact('aminitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.aminity.create');
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
            'aminity' => 'required'
        ]);

        $aminity = new Aminity;
        $aminity->aminity = $request->aminity;

        if($request->status == Null){
            $request->status = 0;
        }
        $aminity->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->aminity)));
        $aminity->status = $request->status;
        $aminity->created_at = Carbon::now();
        $aminity->save();

        $notification = array(
            'message' => 'Aminity Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.aminity.index')->with($notification);
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
        $aminity = Aminity::find($id);
        return view('backend.admin.aminity.edit', compact('aminity'));
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
        $aminity = Aminity::find($id);

        $aminity->aminity = $request->aminity;

        if($request->status == Null){
            $request->status = 0;
        }
        $aminity->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->aminity)));
        $aminity->status = $request->status;
        $aminity->updated_at = Carbon::now();
        $aminity->save();



        $notification = array(
            'message' => 'Aminity Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('property.aminity.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aminity = Aminity::find($id);
        $aminity->delete();

        $notification = array(
            'message' => 'Aminity Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $aminity = Aminity::find($id);
        $aminity->status = 1;
        $aminity->save();

        $notification = array(
            'message' => 'Aminity Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $aminity = Aminity::find($id);
        $aminity->status = 0;
        $aminity->save();

        $notification = array(
            'message' => 'Aminity Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $aminity = Aminity::find($id);
        return view('backend.admin.aminity.view', compact('aminity'));
    }
}
