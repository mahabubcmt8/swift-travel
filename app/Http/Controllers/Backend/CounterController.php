<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;
use Illuminate\Support\Carbon;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::latest()->get();
        return view('backend.admin.counter.index',compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.counter.create');
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
            'counter_no' => 'required',
        ]);

        $counter = new Counter;

        $counter->icon = $request->icon;
        $counter->title = $request->title;
        $counter->counter_no = $request->counter_no;

        if($request->status == Null){
            $request->status = 0;
        }

        $counter->status = $request->status;
        $counter->created_at = Carbon::now();
        $counter->save();

        $notification = array(
            'message' => 'Counter Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('counter.index')->with($notification);
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
        $counter = Counter::find($id);
        return view('backend.admin.counter.edit', compact('counter'));
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
        $counter = Counter::find($id);

        $counter->icon = $request->icon;
        $counter->title = $request->title;
        $counter->counter_no = $request->counter_no;


        if($request->status == Null){
            $request->status = 0;
        }
        $counter->status = $request->status;
        $counter->updated_at = Carbon::now();

        $counter->save();

        $notification = array(
            'message' => 'Counter Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('counter.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $counter = Counter::find($id);
        $counter->delete();

        $notification = array(
            'message' => 'Counter Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){
        $counter = Counter::find($id);
        $counter->status = 1;
        $counter->save();

        $notification = array(
            'message' => 'Counter Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $counter = Counter::find($id);
        $counter->status = 0;
        $counter->save();

        $notification = array(
            'message' => 'Counter Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function view($id){
        $counter = Counter::find($id);
        return view('backend.admin.counter.view', compact('counter'));
    }
}
