<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Vendor;
use App\Models\VendorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Show Admin Dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	/*if(Auth::guard('admin')->check()){
    		die('authorized');
    	} else {
    		die('Un authorized');
    	}*/
        $category = Category::all();
        $products = Product::all();
        $vendor =  Vendor::all();
        $vendor_req = VendorRequest::where('status',0)->get();

        return view('admin.home')
                ->with(compact('category','products','vendor','vendor_req'));
    }
}
