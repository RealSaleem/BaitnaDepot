<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Helpers\AppConstant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\Product;
use stdClass;

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
            $data[$key]['name_en']          = $category->name_en;
            $data[$key]['name_ar']          = $category->name_ar;
            $data[$key]['image']            = $category->image;
            $data[$key]['type']             = $category->type;
            $data[$key]['delivery_fees']    = $category->deleivery_fees;
            $data[$key]['sort']             = $category->sort;
        }

        return $this->SuccessResponse(trans('response.details_loaded_successfully'), $data);
    }

    public function ecommerceVendors()
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
            $data[$key]['is_available'] = $vendor->is_available;
        }
        
        return $this->SuccessResponse(trans('response.vendors_loaded_successfull'), $data);
    }
    
    /**
     * ecommerceVendorProducts
     *
     * @param  mixed $id
     * @return products list
     */
    public function ecommerceVendorProducts($id)
    {
        $products = Product::with('images')->where('vendor_id', $id)->select('id','name_en','name_ar','price')->get();

        if($products->IsEmpty()){
            return $this->FailResponse(trans('response.no_record_found'), null, 200);
        }

        /* $products->each(function($product, $key){
            $product->iteration = $key;
        }); */

        $data = [
            'products'          => $products,
            'total_products'    => $products->count()
        ];
        
        return $this->SuccessResponse(trans('response.list_loaded_successfully'), $data);
    }
    
       
    /**
     * getProductDetails
     *
     * @param  mixed $id
     * @return void
     */
    public function getProductDetails($id)
    {
        $product = Product::with('images', 'vendor')->where('id', $id)->first();

        if($product == null){
            return $this->FailResponse(trans('response.no_record_found'), null, 200);
        }

        $data = [
            'id'                =>  $product->id,
            'name_en'           =>  $product->name_en,
            'name_ar'           =>  $product->name_ar,
            'description_en'    =>  $product->description_en,
            'description_ar'    =>  $product->description_ar,
            'vendor_name_en'    =>  $product->vendor->name_en,
            'vendor_name_ar'    =>  $product->vendor->name_ar,
            'price'             =>  $product->price,
            'quantity'          =>  $product->quantity,
            'images'            =>  $product->images
        ];
        
        return $this->SuccessResponse(trans('response.details_loaded_successfully'), $data);
    }
}
