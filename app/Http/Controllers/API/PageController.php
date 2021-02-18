<?php

namespace App\Http\Controllers\API;

use App\Helpers\AppConstant;
use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\ContactUsMsg;
use App\Models\Advertisement;

class PageController extends ApiBaseController
{
    public  function GetContactUsDetails()
    {
        $contactUs = ContactUs::first();

        $data = [
            'email'         => $contactUs->email,
            'mobile'        => $contactUs->mobile,
            'address'       => $contactUs->address,
            'facebook'      => $contactUs->facebook,
            'twitter'       => $contactUs->twitter,
            'instagram'     => $contactUs->instagram,
            'snapchat'      => $contactUs->snapchat
        ];
        return $this->SuccessResponse(trans('response.details_loaded_successfully'), $data);
    }

    public function contact_us_message(Request $Req)
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'phone'     => 'required|min:8|max:8',
            'message'   => 'required'
        ];

        $validator = Validator::make($Req->all(), $rules);
        if ($validator->fails()) {
            return $this->FailResponse(trans('response.validation_errors'), $validator->getMessageBag(), 200);
        } else {
            $contact = new ContactUsMsg();
            $contact->name      = $Req->name;
            $contact->email     = $Req->email;
            $contact->mobile    = $Req->phone;
            $contact->message   = $Req->message;
            $contact->status    = AppConstant::NEWED;
            $result =   $contact->save();
            if ($result) {
                return $this->SuccessResponse(trans('response.message_sent'), null);
            }
        }
    }

    public function getPageByType($type)
    {
        $page = Page::where('type', $type)->first();
        if ($page) {
            return $this->SuccessResponse('Success', $page);
        } else {
            return $this->FailResponse(trans('response.page_not_found'), null, 200);
        }
    }

    public function getAdvertisementBanner()
    {
        $Advertisement = Advertisement::orderBy('sort', 'asc')->get();

        if(!$Advertisement->IsEmpty()) 
        {
            return $this->SuccessResponse('Success', $Advertisement);
        } else {
            return $this->FailResponse(trans('response.page_not_found'), null, 200);
        }
    }
}