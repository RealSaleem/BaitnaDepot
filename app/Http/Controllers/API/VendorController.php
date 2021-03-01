<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Helpers\AppConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Helpers\Helper;
use App\Models\Category;

class VendorController extends ApiBaseController
{
    public function getCategories($type)
    {
        $catQuery = Category::query();

        if ($type == 'ecommerce') {
            $catQuery = $catQuery->where('type', AppConstant::ECOMMERCESERVICE);
        }

        if ($type == 'contractor') {
            $catQuery = $catQuery->where('type', AppConstant::CONTRACTORSERVICE);
        }

        if ($type == 'heavy_truck') {
            $catQuery = $catQuery->where('type', AppConstant::TRUCKSERVICE);
        }

        $categories = $catQuery->orderBy('sort', 'asc')->get();

        if($categories->IsEmpty()){
            return $this->FailResponse(trans('response.no_record_found'), null, 200);
        }

        $data = [];
        foreach ($categories as $key => $category) 
        {
            $data[$key]['id']               = $category->id;
            $data[$key]['name']             = $category->getLocaleName();
            $data[$key]['image']            = $category->image;
            $data[$key]['type']             = $category->type;
            $data[$key]['delivery_fees']    = $category->deleivery_fees;
            $data[$key]['sort']             = $category->sort;
        }

        return $this->SuccessResponse(trans('response.details_loaded_successfully'), $data);
    }

    public function getEcommerceVendors()
    {
        $vendors = Vendor::where('services', 'LIKE', '%' . AppConstant::ECOMMERCESERVICE . '%')->get();

        if($vendors->IsEmpty()){
            return $this->FailResponse(trans('response.no_record_found'), null, 200);
        }

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
