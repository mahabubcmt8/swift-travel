<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Pages;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\About;
use App\Models\Service;
use App\Models\Product;
use App\Models\Property;
use App\Models\Tour;

class FrontendController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(Request $request)
    {
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();

        $home_view = 'frontend.home';
        return view($home_view, compact('categories'));
    } // end method

    /*=================== End Index Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageAbout($slug){
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.page.index',compact('page','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function categoryShow($slug){
        $categoryShow = Category::where('slug', $slug)->first();
        // dd($categoryShow);
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        return view('frontend.category.index',compact('categories','categoryShow'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function contactusShow(){
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        return view('frontend.contact.index',compact('categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/
     
    /*=================== Start pageAbout Methoed ===================*/
    public function pageProperty($slug){
        $propertyShow = Property::where('slug', $slug)->first();
        // dd($propertyShow);
        $propertyShow->views=$propertyShow->views +1;
        $propertyShow->save();

        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        return view('frontend.property.index',compact('propertyShow','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageBlog($slug){
        $blogShow = Blog::where('slug', $slug)->first();
        // dd($propertyShow);
        $blogShow->view=$blogShow->view +1;
        $blogShow->save();

        $blogCategogry = BlogCategory::latest()->get();
        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        $RecenProperty = Blog::latest()->get();
        return view('frontend.blog.index',compact('blogShow','categories','blogCategogry','RecenProperty'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/

    /*=================== Start pageAbout Methoed ===================*/
    public function pageTour($slug){
        $tour = Tour::where('slug', $slug)->first();
        // dd($propertyShow);
        $tour->views=$tour->views +1;
        $tour->save();

        $categories = Category::where('status',1)->orderBy('id', 'ASC')->limit(5)->get();
        return view('frontend.tour.index',compact('tour','categories'));
    } // end method
    /*=================== end pageAbout Methoed ===================*/
}
