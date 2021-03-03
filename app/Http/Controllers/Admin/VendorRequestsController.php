<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\VendorRequest\GetAll;
use App\Http\Requests\Admin\VendorRequest\Get;
use App\Http\Requests\Admin\VendorRequest\ApprovedVendor;
use App\Http\Requests\Admin\VendorRequest\DeclinedVendor;
use App\Http\Requests\Admin\Categories\GetAllCategoryRequest;
use App\Models\PromoteVendor;
use App\Models\Vendor;

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
//---------------------------------------Promote Vendor Admin Action Area >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
    public function PromoteVendor()
    {
//         $Promote = PromoteVendor::with('User')->where('Promote_Status',0)->get();
        $Promote = PromoteVendor::all();
        return view('admin.Promote_Vendor.promote')->with(compact('Promote'));
    }
    //----------  Edit Promote Vendor Request---------
    public function EditPromoteVendor($id)
    {
        $Promote = PromoteVendor::find($id);
        return view('admin.Promote_Vendor.form.edit')->with(compact('Promote'));
    }

    //----------  Update Promote Vendor Request---------
    public function UpdatePromoteVendor(Request $promoteReq)
    {
                    $Promote = PromoteVendor::find($promoteReq->Promote_id);
                    $Promote->Promote_On    =   $promoteReq->PromoteOn;
                    $Promote->Date_From      =   $promoteReq->DateFrom;
                    $Promote->Date_To        =   $promoteReq->DateTo;
        $result =   $Promote->save();
        if($result){
            return redirect()->route('admin.Promote')->with('success','Vendor Promote Request Updated Successfully');
        }
    }
    //----------  Approve Promote Vendor Request---------
    public function ApprovePromoteRequest($id)
    {                $Promote = PromoteVendor::find($id);
                    $Promote->Promote_Status    = 1;
        $result =   $Promote->save();
        if($result){
            return redirect()->route('admin.Promote')->with('success','Vendor Promote Request Approved');
        }
    }
    //----------  Decline Promote Vendor Request---------
    public function DeclinePromoteRequest($id)
    {               $Promote = PromoteVendor::find($id);
                    $Promote->Promote_Status    = 2;
        $result =   $Promote->save();
        if($result){
            return redirect()->route('admin.Promote')->with('error','Vendor Promote Request Decline');
        }
    }
}
