<?php

namespace App\Http\Requests\Admin\VendorRequest;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\VendorRequest;

class DeclinedVendor extends FormRequest
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
        ];
    }

    public function handle($id)
    {
        $vendor = VendorRequest::find($id);
        $vendor->status = AppConstant::DECLINED;
        $vendor->save();

        return $vendor;
    }
}
