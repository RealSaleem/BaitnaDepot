<?php

namespace App\Http\Requests\Admin\Vendors;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Vendor;

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
        $params         = $this->all();
        return [
            // 'email'     => ['required','email','unique:users'],
            'name_en'   =>  ['required'],
            'mobile'    =>  ['required'],
            'services'  =>  ['required'],
            'logo'      =>  ['nullable', 'image', 'mimes:jpeg,jpg,png'],
            'email'     =>  ['required', 'string', 'email', 'max:191',
                                Rule::unique('users', 'email')->ignore($params['user_id'])->where(function ($query) use ($params) {
                                    return $query->where('type', AppConstant::VENDOR_USER);
                            })]
        ];
    }

    public function handle(){

        $params         = $this->all();

        $user = User::find($params['user_id']);
        $user->name     = $params['name_en'];
        $user->email    = $params['email'];
        $user->mobile   = $params['mobile'];
        $user->save();

        $vendor = Vendor::where('user_id', $user->id)->first();
        $vendor->name_en        = $params['name_en'];
        $vendor->name_ar        = $params['name_ar'];
        $vendor->services       = json_encode($params['services']);
        if($this->hasFile('logo'))
        {
            \App\Helpers\Helper::deleteAttachment($vendor->logo);
            $logo_path      = $this->file('logo')->store('uploads/images');
            $vendor->logo   = $logo_path;
        } else if($params['hidden_logo'] == null){
            \App\Helpers\Helper::deleteAttachment($vendor->logo);
            $vendor->logo = null;
        }

        $vendor->save();

        return $user;
    }
}
