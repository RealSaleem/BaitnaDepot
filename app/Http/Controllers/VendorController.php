<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Vendor\Vendor\GetVendorRequest;
use App\Http\Requests\Vendor\Vendor\UpdateVendorRequest;
use App\Models\WebSocialLink;
use App\Http\Requests\Admin\UpdateSocialLinksRequest;
use App\Models\PromoteVendor;
use Illuminate\Support\Facades\Auth;

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

    public function promote_me_show()
    {
        $check = PromoteVendor::where('Vendor_id', Auth::user()->id)->first();
        return view('vendor.PromoteVendor.promote')->with(compact('check'));
    }

    public function promote_me(Request $PromoteReq)
    {
        $check = PromoteVendor::where('Vendor_id', Auth::user()->id)->where('Promote_Status', 1)->first();
        if ($check) {
            return redirect()->route('promote')->with('error', 'you are aleady promoted.');
        }
        $check = PromoteVendor::where('Vendor_id', Auth::user()->id)->where('Promote_Status', 2)->first();
        if ($check) {
                $this->promote_vendor($PromoteReq);
            return redirect()->route('promote')->with('success', 'Promote Request has been submitted, You will be informed when Super Admin Approve Your request');
        }
        $check = PromoteVendor::where('Vendor_id', Auth::user()->id)->where('Promote_Status', 3)->first();
        if ($check) {
            $this->promote_vendor($PromoteReq);
            return redirect()->route('promote')->with('success', 'Promote Request has been submitted, You will be informed when Super Admin Approve Your request');
        }
        $this->promote_vendor($PromoteReq);
        return redirect()->route('promote')->with('success', 'Promote Request has been submitted, You will be informed when Super Admin Approve Your request');

    }


    public function promote_vendor($PromoteReq)
    {
        $PromoteReq->validate([
            'PromoteOn'  => 'required',
            'DateFrom'   => 'required',
            'DateTo'     => 'required',
        ]);
        $Promote = new PromoteVendor();
        $Promote->vendor_id     =  Auth::user()->id;
        $Promote->Promote_On    =  $PromoteReq->PromoteOn;
        $Promote->Date_From     =  $PromoteReq->DateFrom;
        $Promote->Date_To       =  $PromoteReq->DateTo;
        $result =  $Promote->save();
        return $result;
    }

    public function Image(request $ImgReq)
    {
        return $ImgReq;
    }


    public function Check(Request $Req)
    {
        return $Req;
    }
}
