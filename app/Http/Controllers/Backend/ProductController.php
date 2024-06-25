<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Image;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'description' => 'required',
        ]);

        if($request->hasfile('product_image')){
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1170,482)->save('upload/product/'.$name_gen);
            $product_image = 'upload/product/'.$name_gen;
        }else{
            $product_image = $request->product_image;
        }

        $product = new Product;

        $product->name = $request->name;
        $product->title = $request->title;
        $product->description = $request->description;

        if($request->status == Null){
            $request->status = 0;
        }
        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));
        $product->status = $request->status;
        $product->product_image = $product_image;
        $product->created_at = Carbon::now();
        $product->save();

        $notification = array(
            'message' => 'Product Inserted Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);
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
        $product = Product::find($id);
        return view('backend.admin.product.edit', compact('product'));
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
        $product = Product::find($id);

        if($request->hasfile('product_image')){
            try {
                if(file_exists($product->product_image)){
                    unlink($product->product_image);
                }
            } catch (Exception $e) {

            }
            
            $image = $request->file('product_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1170,482)->save('upload/product/'.$name_gen);
            $product_image = 'upload/product/'.$name_gen;
        }else{
            $product_image = $product->product_image;
        }

        $product->name = $request->name;
        $product->title = $request->title;
        $product->description = $request->description;


        if($request->status == Null){
            $request->status = 0;
        }
        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->title)));
        $product->status = $request->status;
        $product->product_image =$product_image ;

        $product->updated_at = Carbon::now();

        $product->save();

        $notification = array(
            'message' => 'Product Updated Successfully.', 
            'alert-type' => 'success'
        );

        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product_image = $product->product_image;
        unlink($product_image);
        $product->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully.', 
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function active($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        $notification = array(
            'message' => 'Product Active Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        $notification = array(
            'message' => 'Product Disabled Successfully.',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }


    public function view($id){
        $product = Product::find($id);
        return view('backend.admin.product.view', compact('product'));
    }
}
