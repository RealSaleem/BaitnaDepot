<?php

namespace App\Http\Requests\Admin\Vendors;

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
            'name'      =>  ['required'],
            'mobile'    =>  ['required'],
            'services'  =>  ['required'],
            'logo'      =>  ['nullable', 'image', 'mimes:jpeg,jpg,png'],
            'email'     =>  ['required', 'string', 'email', 'max:191', 
                                Rule::unique('users', 'email')->ignore($params['user_id'])->where(function ($query) use ($params) {
                                    return $query->where('type', 1);
                            })]
        ];
    }

    public function handle(){

        $params         = $this->all();

        $user = User::find($params['user_id']);
        $user->name     = $params['name']['en'];
        $user->email    = $params['email'];
        $user->mobile   = $params['mobile'];
        $user->save();

        $vendor = Vendor::where('user_id', $user->id)->first();
        $vendor->name       = $params['name'];
        $vendor->services   = json_encode($params['services']);
        if($this->hasFile('logo'))
        {
            // $logo = $this->file('logo');
            $logo_path      = $this->file('logo')->store('logo');
            $logo_path      = env('IMAGE_BASE_URL').$logo_path;
            $vendor->logo   = $logo_path;
        }
        $vendor->save();

        return $user;
    }
}
