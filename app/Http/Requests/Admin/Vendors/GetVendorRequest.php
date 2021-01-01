<?php

namespace App\Http\Requests\Admin\Vendors;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vendor;

class GetVendorRequest extends FormRequest
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
        $vendor = Vendor::with('user')->where('id', $id)->first();
        return $vendor;
    }
}
