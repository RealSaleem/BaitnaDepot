<?php

namespace App\Http\Requests\Admin\VendorRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorRequest;

class ApprovedVendor extends FormRequest
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
            'name'      => ['required'],
            'email'     => ['required','email','unique:users'],
            'password'  => ['required','confirmed'],
            'mobile'    => ['required'],
            'services'  => ['required']
        ];
    }

    public function handle(){

        $params         = $this->all();
        // $services       = json_encode($params['services']);
        $user = new User;
        $user->name     = $params['name']['en'];
        $user->email    = $params['email'];
        $user->mobile   = $params['mobile'];
        $user->password = bcrypt($params['password']);
        $user->type     = 1; 
        $user->status   = 1; 
        $user->save();

        $vendor = new Vendor;
        $vendor->name       = $params['name'];
        $vendor->services   = json_encode($params['services']);
        $vendor->user()->associate($user);
        $vendor->save();

        /* status changed to approve vendor request */
        $vendor_request = VendorRequest::find($params['vendor_request_id']);
        $vendor_request->status = 1;
        $vendor_request->save();

        return $user;
    }
}
