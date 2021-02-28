<?php

namespace App\Http\Requests\Admin\Vendors;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Vendor;

class CreateVendorRequest extends FormRequest
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
            'name_en'   =>  ['required'],
            // 'email'     => ['required','email','unique:users'],
            'password'  =>  ['required','confirmed'],
            'mobile'    =>  ['required'],
            'services'  =>  ['required'],
            'logo'      =>  ['nullable','image','mimes:jpeg,jpg,png'],
            'email'     =>  ['required', 'string', 'email', 'max:191',
                                Rule::unique('users', 'email')->where(function ($query) use ($params) {
                                    return $query->where('type', AppConstant::VENDOR_USER);
                            })]
        ];
    }

    public function handle(){

        $params         = $this->all();

        $user = new User;
        $user->name     = $params['name_en'];
        $user->email    = $params['email'];
        $user->mobile   = $params['mobile'];
        $user->password = bcrypt($params['password']);
        $user->type     = AppConstant::VENDOR_USER;
        $user->status   = AppConstant::ACTIVE;
        $user->save();

        $vendor = new Vendor;
        $vendor->name_en    = $params['name_en'];
        $vendor->name_ar    = $params['name_ar'] ?? $params['name_en'];
        $vendor->services   = json_encode($params['services']);

        if($this->hasFile('logo'))
        {
            $logo_path      = $this->file('logo')->store('uploads/images');
            // $logo_path      = env('IMAGE_BASE_URL').$logo_path;
            $vendor->logo   = $logo_path;
        }
        $vendor->save();

        $user->vendor()->associate($vendor);
        $user->save();

        return $user;
    }
}
