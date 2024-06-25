<?php


use App\Models\Setting;
use App\Models\Pages;

use Illuminate\Support\Collection;

if (!function_exists('get_setting')) {
    function get_setting($name)
    {
        return Setting::where('name', $name)->first();
    }
}


// Search By Side All Categories // 
if (!function_exists('get_all_categories')) {
    function get_all_categories()
    {
        $categories = Category::where('status', 1)->latest()->get();
        return $categories;
    }
}
//Footer page
if (!function_exists('get_pages_both_footer')) {
    function get_pages_both_footer()
    {
        return Pages::where('status',1)
                ->where('position',3)
                ->orWhere('position',1)
                ->orderBy('id','ASC')
                ->get();
    }
}

//Header page
if (!function_exists('get_pages_nav_header')) {
    function get_pages_nav_header()
    {
        return Pages::where('status',1)
                ->where('position',3)
                ->orderBy('id','ASC')
                ->get();
    }
}

//Footer page
if (!function_exists('get_footer_banner')) {
    function get_footer_banner()
    {
        return Banner::where('status',1)
                ->where('position',0)
                ->orderBy('id','DESC')
                ->first();
    }
}
