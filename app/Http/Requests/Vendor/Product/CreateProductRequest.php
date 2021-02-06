<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Models\ProductImage;

class CreateProductRequest extends FormRequest
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
            'name_en'   => ['required'],
            'price'     => ['required'],
            'quantity'  => ['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_en.required' => trans('validation.custom.name_en.required'),
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $product = new Product;
        $product->name_en           = $params['name_en'];
        $product->name_ar           = $params['name_ar'] ?? $params['name_en'];
        $product->description_en    = $params['description_en'];
        $product->description_ar    = $params['description_ar'] ?? $params['description_en'];
        $product->price             = $params['price'];
        $product->quantity          = $params['quantity'];
        $product->delivery_fees     = $params['delivery_fees'];
        $product->vendor_id         = \Auth::user()->id;
        $product->save();

        if($this->images != null)
        {
            foreach($this->images as $image)
            {
                $productImage               = new ProductImage();
                $productImage->product_id   = $product->id; 
                $productImage->name         = $image['name']; 
                $productImage->url          = $image['path']; 
                $productImage->size         = $image['size'];
                $productImage->save(); 
            }
        }
    }
}