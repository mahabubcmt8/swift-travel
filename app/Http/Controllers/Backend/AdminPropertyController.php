<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use App\Models\City;
use App\Models\PropertyPurpose;
use App\Models\Aminity;
use App\Models\NearestLocation;
use App\Models\PropertyAminity;
use App\Models\PropertyNearestLocation;
use App\Models\PropertyImage;
use Illuminate\Support\Carbon;
use Image;
use Auth;
use File;


class AdminPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::latest()->get();
        return view('backend.admin.property.index',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyTypes      = PropertyType::where('status',1)->get();
        $cities             = City::where('status',1)->get();
        $purposes           = PropertyPurpose::where('status',1)->get();
        $aminities          = Aminity::where('status',1)->get();
        $nearest_locatoins  = NearestLocation::where('status',1)->get();
       
        return view('backend.admin.property.create',compact('propertyTypes','cities','purposes','aminities','nearest_locatoins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // $this->validate($request, [
        //     'title'=>'required|unique:properties',
        //     'slug'=>'required|unique:properties',
        //     'property_type'=>'required',
        //     'city'=>'required',
        //     'address'=>'required',
        //     'email'=>'required|email',
        //     'purpose'=>'required',
        //     'price'=>'required|numeric',
        //     'area'=>'required',
        //     'unit'=>'required',
        //     'room'=>'required',
        //     'bedroom'=>'required',
        //     'bathroom'=>'required',
        //     'floor'=>'required',
        //     'thumbnail_image'=>'required|file',
        //     "slider_images"    => "required",
        //     'description'=>'required',
        //     'status'=>'required',
        //     'featured'=>'required',
        //     'urgent_property'=>'required',
        //     "pdf_file" => "mimes:pdf|max:10000"
        // ]);

        $video_link='';
        if(preg_match('/https:\/\/www\.youtube\.com\/watch\?v=[^&]+/', $request->video_link)) {
            $video_link = $request->video_link;
        }

        $property                           = new Property();
        $admin                              = Auth::guard('web')->user();
        $property->admin_id                 = $admin->id;
        $property->title                    = $request->title;
        $property->slug                     = $request->slug;
        $property->property_type_id         = $request->property_type;
        $property->city_id                  = $request->city;
        $property->address                  = $request->address;
        $property->phone                    = $request->phone;
        $property->email                    = $request->email;
        $property->website                  = $request->website;
        $property->property_purpose_id      = $request->purpose;
        $property->price                    = $request->price;
        $property->period                   = $request->period ? $request->period : null;
        $property->area                     = $request->area;
        $property->number_of_unit           = $request->unit;
        $property->number_of_room           = $request->room;
        $property->number_of_bedroom        = $request->bedroom;
        $property->number_of_bathroom       = $request->bathroom;
        $property->number_of_floor          = $request->floor;
        $property->number_of_kitchen        = $request->kitchen;
        $property->number_of_parking        = $request->parking;
        $property->video_link               = $video_link;
        $property->description              = $request->description;
        $property->short_description        = $request->short_description;
        $property->status                   = $request->status;
        $property->is_featured              = $request->featured;
        $property->urgent_property          = $request->urgent_property;
        $property->top_property             = $request->top_property;
        $property->seo_title                = $request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description          = $request->seo_description ? $request->seo_description : $request->title;

        // pdf file
        if($request->file('pdf_file')){
            $file=$request->pdf_file;
            $file_ext=$file->getClientOriginalExtension();
            $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            $file_path=$file_name;
            $file->move(public_path().'/upload/custom-images/',$file_path);
            $property->file=$file_path;
        }


        //thumbnail image
        if($request->file('thumbnail_image')){
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
            $thumb_name= 'property-thumb-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='upload/custom-images/'.$thumb_name;

            Image::make($thumbnail_image)
                ->save(public_path()."/".$thumb_path);
            $property->thumbnail_image=$thumb_path;

        }

        $property->save();
        // property end


        // insert aminity
        if($request->aminities){
            foreach($request->aminities as $amnty){
                $aminity= new PropertyAminity();
                $aminity->property_id=$property->id;
                $aminity->aminity_id=$amnty;
                $aminity->save();
            }
        }

        // insert nearest place
        $exist_location=[];
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new PropertyNearestLocation();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->nearest_location_id=$location;
                            $nearest_location->distance=$request->distances[$index];
                            $nearest_location->save();
                        }
                        $exist_location[]=$location;

                    }
                }
            }
        }

        // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                    // for small image
                    $slider_image= 'property-slide-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='upload/custom-images/'.$slider_image;

                    Image::make($image)
                        ->save(public_path()."/".$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }

        $notification = array(
            'message' => 'Property Inserted Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('property.index')->with($notification);
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
        $property = Property::find($id);

        $propertyTypes      = PropertyType::where('status',1)->get();
        $cities             = City::where('status',1)->get();
        $purposes           = PropertyPurpose::where('status',1)->get();
        $aminities          = Aminity::where('status',1)->get();
        $nearest_locatoins  = NearestLocation::where('status',1)->get();

        return view('backend.admin.property.edit',compact('property','propertyTypes','cities','purposes','aminities','nearest_locatoins'));
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

        $property = Property::find($id);

        // $this->validate($request, [
        //     'title'=>'required|unique:properties,title,'.$property,
        //     'slug'=>'required|unique:properties,slug,'.$property,
        //     'property_type'=>'required',
        //     'city'=>'required',
        //     'address'=>'required',
        //     'email'=>'required|email',
        //     'purpose'=>'required',
        //     'price'=>'required|numeric',
        //     'area'=>'required',
        //     'unit'=>'required',
        //     'room'=>'required',
        //     'bedroom'=>'required',
        //     'bathroom'=>'required',
        //     'floor'=>'required',
        //     'description'=>'required',
        //     'status'=>'required',
        //     'featured'=>'required',
        //     'urgent_property'=>'required',
        //     "pdf_file" => "mimes:pdf|max:10000"
        // ]);

        $video_link='';
        if(preg_match('/https:\/\/www\.youtube\.com\/watch\?v=[^&]+/', $request->video_link)) {
            $video_link = $request->video_link;
        }

        $admin                              = Auth::guard('web')->user();
        $property->admin_id                 = $admin->id;
        $property->title                    = $request->title;
        $property->slug                     = $request->slug;
        $property->property_type_id         = $request->property_type;
        $property->city_id                  = $request->city;
        $property->address                  = $request->address;
        $property->phone                    = $request->phone;
        $property->email                    = $request->email;
        $property->website                  = $request->website;
        $property->property_purpose_id      = $request->purpose;
        $property->price                    = $request->price;
        $property->period                   = $request->period ? $request->period : null;
        $property->area                     = $request->area;
        $property->number_of_unit           = $request->unit;
        $property->number_of_room           = $request->room;
        $property->number_of_bedroom        = $request->bedroom;
        $property->number_of_bathroom       = $request->bathroom;
        $property->number_of_floor          = $request->floor;
        $property->number_of_kitchen        = $request->kitchen;
        $property->number_of_parking        = $request->parking;
        $property->video_link               = $video_link;
        $property->description              = $request->description;
        $property->short_description        = $request->short_description;
        $property->status                   = $request->status;
        $property->is_featured              = $request->featured;
        $property->urgent_property          = $request->urgent_property;
        $property->top_property             = $request->top_property;
        $property->seo_title                = $request->seo_title ? $request->seo_title : $request->title;
        $property->seo_description          = $request->seo_description ? $request->seo_description : $request->title;

        // pdf file
        if($request->file('pdf_file')){
            $file=$request->pdf_file;
            $old_file=$property->file;
            $file_ext=$file->getClientOriginalExtension();
            $file_name= 'property-file-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$file_ext;
            $file_path=$file_name;
            $file->move(public_path().'/uploads/custom-images/',$file_path);
            $property->file=$file_path;
            $property->save();

            if($old_file){
                if(File::exists(public_path().'/'."uploads/custom-images/".$old_file)) unlink(public_path().'/'."upload/custom-images/".$old_file);
            }

        }


        //thumbnail image
        if($request->file('thumbnail_image')){
            $old_thumbnail=$property->thumbnail_image;
            $thumbnail_image=$request->thumbnail_image;
            $thumbnail_extention=$thumbnail_image->getClientOriginalExtension();
            $thumb_name= 'property-thumb-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$thumbnail_extention;
            $thumb_path='upload/custom-images/'.$thumb_name;
            Image::make($thumbnail_image)
                ->save(public_path().'/'.$thumb_path);

            $property->thumbnail_image=$thumb_path;
            $property->save();
            if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);
        }

        
        $property->save();
        // property end

        // for aminity
        $old_aminities=$property->propertyAminities;
        if($request->aminities){
            foreach($request->aminities as $amnty){
                $aminity= new PropertyAminity();
                $aminity->property_id=$property->id;
                $aminity->aminity_id=$amnty;
                $aminity->save();
            }

            if($old_aminities->count()>0){
                foreach($old_aminities as $old_aminity){
                    $old_aminity->delete();
                }
            }
        }else{
            if($old_aminities->count()>0){
                foreach($old_aminities as $old_aminity){
                    $old_aminity->delete();
                }
            }
        }


        // insert nearest place
        $old_nearest_locations=$property->propertyNearestLocations;
        $exist_location=[];
        $new_nearest_location=false;
        if($request->nearest_locations){
            foreach($request->nearest_locations as $index => $location){
                if($location){
                    if($request->distances[$index]){
                        if(!in_array($location, $exist_location)){
                            $nearest_location= new PropertyNearestLocation();
                            $nearest_location->property_id=$property->id;
                            $nearest_location->nearest_location_id=$location;
                            $nearest_location->distance=$request->distances[$index];
                            $nearest_location->save();
                            $new_nearest_location=true;
                        }
                        $exist_location[]=$location;

                    }
                }
            }

            if($new_nearest_location){
                if($old_nearest_locations->count() > 0){
                    foreach($old_nearest_locations as $old_location){
                        $old_location->delete();
                    }
                }
            }
        }else{
            if($old_nearest_locations->count() > 0){
                foreach($old_nearest_locations as $old_location){
                    $old_location->delete();
                }
            }

        }

        // slider image
        if($request->file('slider_images')){
            $images=$request->slider_images;
            foreach($images as $image){
                if($image != null){
                    $propertyImage=new PropertyImage();
                    $slider_ext=$image->getClientOriginalExtension();
                    // for small image
                    $slider_image= 'property-slide-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$slider_ext;
                    $slider_path='upload/custom-images/'.$slider_image;
                    Image::make($image)
                    ->save(public_path().'/'.$slider_path);

                    $propertyImage->image=$slider_path;
                    $propertyImage->property_id=$property->id;
                    $propertyImage->save();

                }
            }
        }

        $notification = array(
            'message' => 'Property Updated Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->route('property.index')->with($notification);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);

        $old_thumbnail  =   $property->thumbnail_image;
        $old_pdf        =   $property->file;

        PropertyAminity::where('property_id',$property->id)->delete();
        PropertyNearestLocation::where('property_id',$property->id)->delete();

        foreach($property->propertyImages as $image){
            if(File::exists(public_path().'/'.$image->image)) unlink(public_path().'/'.$image->image);
        }

        PropertyImage::where('property_id',$property->id)->delete();


        if($old_pdf){
            if(File::exists(public_path().'/'.'uploads/custom-images/'.$old_pdf)) unlink(public_path().'/'.'uploads/custom-images/'.$old_pdf);
        }

        if(File::exists(public_path().'/'.$old_thumbnail)) unlink(public_path().'/'.$old_thumbnail);

        $property->delete();

        $notification = array(
            'message' => 'Property Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function propertySliderImage($id){
        $image=PropertyImage::find($id);
        $old_image=$image->image;
        $image->delete();
        if(File::exists(public_path().'/'.$old_image)) unlink(public_path().'/'.$old_image);


        return response()->json(['success'=>'Property Slider Image Deleted Successfully.']);
    }

    public function deletePdfFile($id){

        $property=Property::find($id);
        $old_file= $property->file;
        $property->file=null;
        $property->save();
        $old_file= "uploads/custom-images/".$old_file;
        if(File::exists(public_path().'/'.$old_file)) unlink(public_path().'/'.$old_file);


        $notification = array(
            'message' => 'Property PDF File Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return response()->json(['success'=>$notification]);
    }

    public function existNearestLocation($id){
        $nearest_location=PropertyNearestLocation::find($id);
        $nearest_location->delete();


        $notification = array(
            'message' => 'NearestLocation Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return response()->json(['success'=>$notification]);
    }

    public function active($id){

        $property = Property::find($id);
        $property->status = 1;
        $property->save();

        $notification = array(
            'message' => 'Property Active Successfully.', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $property = Property::find($id);
        $property->status = 0;
        $property->save();

        $notification = array(
            'message' => 'Property Disabled Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function view($id){
        $property = Property::find($id);
        return view('backend.admin.property.view', compact('property'));
    }
}
