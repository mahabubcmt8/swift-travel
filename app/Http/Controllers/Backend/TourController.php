<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Carbon;
use Image;
use Session;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderBy('id','desc')->get();
        return view('backend.admin.tour.index',compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'regular_price' => 'required',
            'tour_country' => 'required',
            'tour_division' => 'required',
            'tour_day' => 'required',
            'tour_group' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if($request->hasfile('image')){
            $image = $request->image;
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1280)->save('upload/tour/'.$name_gen);
            $save_url = 'upload/tour/'.$name_gen;
        }else{
            $save_url = '';
        }

        $tour =                 new Tour();
        $tour->title            = $request->title ?? null;
        $tour->booking_link     = $request->booking_link ?? null;
        $slug                   = strtolower(str_replace(' ', '-', $request->title));
        $tour->slug             = $slug;
        $tour->depture          = $request->depture ?? null;
        $tour->depture_time     = $request->depture_time ?? null;
        $tour->return_time      = $request->return_time ?? null;
        $tour->description      = $request->description ?? null;
        $tour->regular_price    = $request->regular_price ?? null;
        $tour->discount_price   = $request->discount_price ?? null;
        $tour->discount_type    = $request->discount_type ?? null;
        $tour->tour_country     = $request->tour_country ?? null;
        $tour->tour_day         = $request->tour_day ?? null;
        $tour->tour_group       = $request->tour_group ?? null;
        $tour->image            = $save_url ?? null;
       $tour->tour_division = $request->tour_division ?? null;

        // $tour->dress_code       = implode(',',     $request->dress_code) ?? null;
        // $tour->price_includes   = implode(',', $request->price_includes) ?? null;
        // $tour->price_excludes   = implode(',', $request->price_excludes ?? null);
        $tour->price_includes   = $request->price_includes ?? null;
        $tour->price_excludes   = $request->price_excludes ?? null;
        $tour->dress_code       = $request->dress_code;
        $tour->is_popular       = $request->is_popular ?? null;
        $tour->status           = $request->status ?? null;

        $tour->save();

        $notification = array(
            'message' => 'Tour created successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('tour.index')->with($notification);

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
        $tour = Tour::find($id);
        return view('backend.admin.tour.edit',compact('tour'));
    }

    public function view($id)
    {
        $tour = Tour::find($id);
        return view('backend.admin.tour.view',compact('tour'));
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
        $tour = Tour::find($id);

        if($request->hasfile('image')){
            try {
                if(file_exists($tour->image)){
                    unlink($tour->image);
                }
            } catch (Exception $e) {

            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1280)->save('upload/tour/'.$name_gen);
            $tour_img = 'upload/tour/'.$name_gen;
        }else{
            $tour_img = $tour->image;
        }

        $tour->title            = $request->title;
        $slug                   = strtolower(str_replace(' ', '-', $request->title));
        $tour->slug             = $slug;
        $tour->booking_link     = $request->booking_link;
        $tour->depture          = $request->depture;
        $tour->depture_time     = $request->depture_time;
        $tour->return_time      = $request->return_time;
        $tour->description      = $request->description;
        $tour->regular_price    = $request->regular_price;
        $tour->discount_price   = $request->discount_price;
        $tour->discount_type    = $request->discount_type;
        $tour->tour_country     = $request->tour_country;
        $tour->tour_day         = $request->tour_day;
        $tour->tour_group       = $request->tour_group;
        $tour->image            = $tour_img;
        $tour->tour_division    = $request->tour_division ?? null;
        $tour->dress_code       = $request->dress_code ?? null;
        $tour->price_includes   = $request->price_includes ?? null;
        $tour->price_excludes   = $request->price_excludes ?? null;
        $tour->is_popular       = $request->is_popular;
        $tour->status           = $request->status;

        $tour->save();

        $notification = array(
            'message' => 'Tour updated successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('tour.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        try {
            if(file_exists($tour->image)){
                unlink($tour->image);
            }
        } catch (Exception $e) {

        }

        $tour->delete();

        $notification = array(
            'message' => 'Tour Deleted Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active($id){
        $tour = Tour::find($id);
        $tour->status = 1;
        $tour->save();

        $notification = array(
            'message' => 'Tour Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $tour = Tour::find($id);
        $tour->status = 0;
        $tour->save();

        $notification = array(
            'message' => 'Tour Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
