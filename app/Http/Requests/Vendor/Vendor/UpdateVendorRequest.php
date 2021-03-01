<?php

namespace App\Http\Requests\Vendor\Vendor;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;

class UpdateVendorRequest extends FormRequest
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
            'name_en'   =>  ['required'],
            'mobile'    =>  ['required', 'min:8', 'max:8'],
            'logo'      =>  ['nullable', 'image', 'mimes:jpeg,jpg,png']
        ];
    }

    public function messages()
    {
        return [
            'mobile.min' => trans('validation.custom.mobile.digits_between'),
            'mobile.max' => trans('validation.custom.mobile.digits_between')
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $user_id        = Auth::user()->id;
        $user           = User::with('vendor')->find($user_id);
        $user->name     = $params['name_en'];
        $user->mobile   = $params['mobile'];
        $user->save();

        $vendor                 = $user->vendor;
        $vendor->name_en        = $params['name_en'];
        $vendor->is_available   = isset($params['available']) ? Vendor::YES : Vendor::NO;
        $vendor->name_ar        = $params['name_ar'] != null ? $params['name_ar'] : $params['name_en'];

        if($this->hasFile('logo') && isset($params['logo']))
        {
            $logo_path      = $this->file('logo')->store('uploads/images');
            $vendor->logo   = $logo_path;
        } elseif($params['hidden_image'] == null) {
            \App\Helpers\Helper::deleteAttachment($vendor->logo);
            $vendor->logo   = null;
        }
        $vendor->save();

        return $user;
    }
}
