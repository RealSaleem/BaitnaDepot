<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class PageController extends ApiBaseController
{
    public  function GetContactUsDetails()
    {
        $contactUs = ContactUs::first();

        $data = [
            'id'            => $contactUs->id,
            'email'         => $contactUs->email,
            'mobile'        => $contactUs->mobile,
            'address'       => $contactUs->address,
            'facebook'      => $contactUs->facebook,
            'twitter'       => $contactUs->twitter,
            'instagram'     => $contactUs->instagram,
            'snapchat'      => $contactUs->snapchat
        ];
        return $this->SuccessResponse('Profile loaded successfully', $data);
    }

}
