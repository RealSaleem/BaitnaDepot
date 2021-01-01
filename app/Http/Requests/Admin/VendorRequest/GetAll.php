<?php

namespace App\Http\Requests\Admin\VendorRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\VendorRequest;

class GetAll extends FormRequest
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

    public function handle(){
        $requests = VendorRequest::get();
        return $requests;
    }
}
