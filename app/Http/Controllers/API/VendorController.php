<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Helpers\AppConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Helpers\Helper;

class VendorController extends ApiBaseController
{
    public function getEcommerceVendors()
    {
        $vendors = Vendor::where('services', 'LIKE', '%' . AppConstant::VENDORSERVICE . '%')->get();
        $data = [];
        foreach ($vendors as $key => $vendor) {
            $data[$key]['id']           = $vendor->id;
            $data[$key]['name_en']      = $vendor->name_en;
            $data[$key]['name_ar']      = $vendor->name_ar;
            $data[$key]['logo']         = Helper::getImage($vendor->logo);
        }
        return $this->SuccessResponse(trans('response.vendors_loaded_successfull'), $data);
    }
}
