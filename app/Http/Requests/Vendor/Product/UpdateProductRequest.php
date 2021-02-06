<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Models\ProductImage;

class UpdateProductRequest extends FormRequest
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
            'price'     => ['required']
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $size = $this->getSizeAttributes($params);

        $product = Product::find($params['id']);
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
            ProductImage::where('product_id', $product->id)->delete();
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

    private function getSizeAttributes($params)
    {
        $size_en = explode(',', $params['size_en']); //convert stringto array because english arrtibutes recieving in comma seperated strings 
        $size_ar = $params['size_ar'];
    }
}
