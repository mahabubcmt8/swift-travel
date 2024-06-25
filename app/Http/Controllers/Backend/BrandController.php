<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.brand.create');
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        if($request->hasfile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,55)->save('upload/brand/'.$name_gen);
            $image = 'upload/brand/'.$name_gen;
        }else{
            $image = $request->image;
        }

        $agent = new Brand;

        if($request->status == Null){
            $request->status = 0;
        }
        $agent->status = $request->status;
        $agent->image = $image;
        $agent->created_at = Carbon::now();
        $agent->save();

        $notification = array(
            'message' => 'Brand Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('brand.index')->with($notification);
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
        $brand = Brand::find($id);
        return view('backend.admin.brand.edit', compact('brand'));
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
        $brand = Brand::find($id);

        if($request->hasfile('image')){
            try {
                if(file_exists($brand->image)){
                    unlink($brand->image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,55)->save('upload/brand/'.$name_gen);
            $image = 'upload/brand/'.$name_gen;
        }else{
            $image = $brand->image;
        }


        if($request->status == Null){
            $request->status = 0;
        }
        $brand->status = $request->status;
        $brand->image = $image ;

        $brand->updated_at = Carbon::now();

        $brand->save();

        $notification = array(
            'message' => 'Brand Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $image = $brand->image;
        unlink($image);
        $brand->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){

        $brand = Brand::find($id);
        $brand->status = 1;
        $brand->save();

        $notification = array(
            'message' => 'Brand Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->save();

        $notification = array(
            'message' => 'Brand Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $brand = Brand::find($id);
        return view('backend.admin.brand.view', compact('brand'));
    }
}
