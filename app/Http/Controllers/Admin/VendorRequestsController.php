<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VendorRequest\GetAll;
use App\Http\Requests\Admin\VendorRequest\Get;
use App\Http\Requests\Admin\VendorRequest\ApprovedVendor;
use App\Http\Requests\Admin\VendorRequest\DeclinedVendor;
use App\Http\Requests\Admin\Categories\GetAllCategoryRequest;

class VendorRequestsController extends Controller
{
    public function index(GetAll $request)
    {
    	$vendors = $request->handle();
    	return view('admin.vendor_requests.index', ['vendors' => $vendors]);
    }

    public function get(Get $request, $id)
    {
    	$request->id = $id;
    	$vendor = $request->handle();
    	return view('admin.vendor_requests.show', ['vendor' => $vendor]);
    }

    public function approveVendorForm(Get $request, $id)
    {
    	$request->id = $id;
    	$vendor = $request->handle();

    	$category_request = new GetAllCategoryRequest;
    	$categories = $category_request->handle();
    	return view('admin.vendor_requests.approve_vendor', ['vendor' => $vendor, 'categories' => $categories]);
    }

    public function approvedVendorRequest(ApprovedVendor $request)
    {
    	$vendor = $request->handle();
    	return redirect()->route('admin.vendor_requests')->withSuccess(trans('toaster.vendor_has_been_added_successfully'));
    }

    public function declinedVendorRequest(DeclinedVendor $request, $id)
    {
        $vendor = $request->handle($id);

        return redirect()->route('admin.vendor_requests')->withSuccess(trans('toaster.vendor_declined'));
    }
}
