<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
        return view('admin.home');
    }
}