<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Vendor\Vendor\GetVendorRequest;
use App\Http\Requests\Vendor\Vendor\UpdateVendorRequest;
use App\Models\WebSocialLink;
use App\Http\Requests\Admin\UpdateSocialLinksRequest;
use Auth;

class VendorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index(GetVendorRequest $request)
    {
        $user = $request->handle();
        return view('vendor.store.show', compact('user'));
    }

    public function edit_store(GetVendorRequest $request)
    {
        $user = $request->handle();
        return view('vendor.store.edit_store', compact('user'));
    }

    public function update_store(UpdateVendorRequest $request)
    {
        $user = $request->handle();
        return redirect()->route('store')->withSuccess(trans('toaster.updated_successfully'));
    }

    public function getSocial()
    {
        $vendor_id      = Auth::user()->vendor->id;
        $social_media   = WebSocialLink::find($vendor_id);
        return view('vendor.social.social_links', compact('social_media'));
    }

    public function saveSocial(UpdateSocialLinksRequest $request)
    {
        $request->handle();
        return redirect()->route('social_links')->withSuccess(trans('toaster.updated_successfully'));
    }
}
