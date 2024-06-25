<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Carbon;
use Image;
use Session;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::latest()->get();
        return view('backend.admin.agent.index',compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.agent.create');
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
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required',
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(170,232)->save('upload/agent/'.$name_gen);
            $image = 'upload/agent/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $agent = new Agent;

        $agent->name            = $request->name;
        $agent->designation     = $request->designation;
        $agent->description     = $request->description;
        $agent->facebook_url    = $request->facebook_url;
        $agent->linkedin_url    = $request->linkedin_url;
        $agent->twitter_url     = $request->twitter_url;
        $agent->whatsapp_url    = $request->whatsapp_url;

        if($request->status == Null){
            $request->status = 0;
        }
        $agent->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $agent->status = $request->status;
        $agent->image = $image;
        $agent->created_at = Carbon::now();
        $agent->save();

        $notification = array(
            'message' => 'Agent Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('agent.index')->with($notification);
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
        $agent = Agent::find($id);
        return view('backend.admin.agent.edit', compact('agent'));
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
        $agent = Agent::find($id);

        if($request->hasfile('image')){
            try {
                if(file_exists($agent->image)){
                    unlink($agent->image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(170,232)->save('upload/agent/'.$name_gen);
            $image = 'upload/agent/'.$name_gen;
        }else{
            $image = $agent->image;
        }

        $agent->name            = $request->name;
        $agent->designation     = $request->designation;
        $agent->description     = $request->description;
        $agent->facebook_url    = $request->facebook_url;
        $agent->linkedin_url    = $request->linkedin_url;
        $agent->twitter_url     = $request->twitter_url;
        $agent->whatsapp_url    = $request->whatsapp_url;


        if($request->status == Null){
            $request->status = 0;
        }
        $agent->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $agent->status = $request->status;
        $agent->image = $image ;

        $agent->updated_at = Carbon::now();

        $agent->save();

        $notification = array(
            'message' => 'Agent Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('agent.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::find($id);
        $image = $agent->image;
        unlink($image);
        $agent->delete();

        $notification = array(
            'message' => 'Agent Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $agent = Agent::find($id);
        $agent->status = 1;
        $agent->save();

        $notification = array(
            'message' => 'Agent Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $agent = Agent::find($id);
        $agent->status = 0;
        $agent->save();

        $notification = array(
            'message' => 'Agent Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $agent = Agent::find($id);
        return view('backend.admin.agent.view', compact('agent'));
    }
}
