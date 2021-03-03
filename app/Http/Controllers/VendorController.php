<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Vendor\Vendor\GetVendorRequest;
use App\Http\Requests\Vendor\Vendor\UpdateVendorRequest;
use App\Models\WebSocialLink;
use App\Http\Requests\Admin\UpdateSocialLinksRequest;
use App\Models\promote_vendor;
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
        $check = promote_vendor::where('Vendor_id',Auth::user()->id)->first();
        return view('vendor.PromoteVendor.promote')->with(compact('check'));
    }

    public function promote_me(Request $PromoteReq)
    {
        $check = promote_vendor::where('Vendor_id',Auth::user()->id)->where('Promote_Status',2)->first();
      if($check==false){
          if($check->Prmote_Status == 3){
              $PromoteReq->validate([
                  'PromoteOn'  => 'required',
                  'DateFrom'   => 'required',
                  'DateTo'     => 'required',
              ]);

              $Promote = new promote_vendor();
              $Promote->vendor_id     =  Auth::user()->id;
              $Promote->Promote_On    =  $PromoteReq->PromoteOn;
              $Promote->Date_From     =  $PromoteReq->DateFrom;
              $Promote->Date_To       =  $PromoteReq->DateTo;
              $result =  $Promote->save();

              if($result)
              {            return redirect()->route('promote')
                  ->with('success','Promote Request has been submitted, You will be informed when Super Admin Approve Your request');
              }
          }else{
              return redirect()->route('promote')
                  ->with('error','You are already requested.. ');
          }
      }else{
          return redirect()->route('promote')
              ->with('error','your previous request was decline by admin. ');
      }


    }

    public function Image(request $ImgReq){
        return $ImgReq;
    }


    public function Check(Request $Req)
    {
        return $Req;
    }
}
