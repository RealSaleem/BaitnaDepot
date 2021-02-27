<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Vendors\GetAllVendorsRequest;
use App\Http\Requests\Admin\Vendors\CreateVendorRequest;
use App\Http\Requests\Admin\Vendors\GetVendorRequest;
use App\Http\Requests\Admin\Vendors\UpdateVendorRequest;
use App\Http\Requests\Admin\Categories\GetAllCategoryRequest;
use App\Models\User;
use App\Models\Vendor;

class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllVendorsRequest $request)
    {
        $vendors = $request->handle();
        return view('admin.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_request = new GetAllCategoryRequest;
        $categories = $category_request->handle();
        return view('admin.vendors.forms.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVendorRequest $request)
    {
        $vendor = $request->handle();
        return redirect()->route('admin.vendors.index')->withSuccess(trans('toaster.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetVendorRequest $request, $id)
    {
        $request['id'] = $id;
        $vendor = $request->handle();
        return view('admin.vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GetVendorRequest $request, $id)
    {
        $request['id'] = $id;
        $vendor = $request->handle();
        $category_request = new GetAllCategoryRequest;
        $categories = $category_request->handle();
        return view('admin.vendors.forms.edit', compact('vendor', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorRequest $request, $id)
    {
        $vendor = $request->handle();
        return redirect()->route('admin.vendors.index')->withSuccess(trans('toaster.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user   = User::find($id);
        $vendor = Vendor::find($user->vendor_id);
        \App\Helpers\Helper::deleteAttachment($vendor->logo);
        $result =  $vendor->delete();
        $user->delete();
        if ($result) {
            return redirect()->route('admin.vendors.index')->with('error', \Lang::get('toaster.deleted_successfully'));
        }
    }
}
