<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use Artisan;
use Cache;

class AdminController extends Controller
{
    /*=================== Start Logout Methoed ===================*/

    public function AminLogout(Request $request){

       
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // end method
    /*=================== End Logout Methoed ===================*/
}
