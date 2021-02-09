<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContractorWorkingHour;
use App\Http\Requests\WorkingHours\SaveContractorWorkingHours;
use App\Http\Requests\WorkingHours\InitContractorWorkingHours;
use Auth;

class WorkingHourController extends Controller
{
    public function index()
    {
    	$vendor_id = Auth::user()->vendor->id;
    	$working_times = ContractorWorkingHour::with('day')->where('vendor_id', $vendor_id)->get();
    	
    	if($working_times->isEmpty()){
    		$request = new InitContractorWorkingHours();
    		$working_times = $request->handle($vendor_id);
    	}

    	$data = [
    		'working_times'	=> $working_times,
    		'vendor_id'		=> Auth::user()->vendor->id
    	];

    	return view('vendor.working_hours', $data);
    }

    public function update(SaveContractorWorkingHours $request)
    {
    	$request->handle();
    }
}