<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use Auth;

class GetAllProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function handle(){
        $base_products = Product::with('vendor');
        
        if(!Auth::guard('admin')->check()){
            $base_products = $base_products->where('vendor_id', Auth::user()->id);
        }
        
        $products = $base_products->get();        
        return $products;
    }
}
