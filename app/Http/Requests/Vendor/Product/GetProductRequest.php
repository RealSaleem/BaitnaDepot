<?php

namespace App\Http\Requests\Vendor\Product;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class GetProductRequest extends FormRequest
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

    public function handle()
    {
        $id = $this->id;
        $product = Product::with('images')->where('id', $id)->first();

        return $product;
    }
}
