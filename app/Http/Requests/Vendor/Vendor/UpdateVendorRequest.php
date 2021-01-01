<?php

namespace App\Http\Requests\Vendor\Vendor;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Vendor;
use Auth;

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
            'name'      =>  ['required'],
            'mobile'    =>  ['required'],
            'logo'      =>  ['nullable', 'image', 'mimes:jpeg,jpg,png']
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $user->name     = $params['name']['en'];
        $user->mobile   = $params['mobile'];
        $user->save();

        $vendor         = Vendor::where('user_id', $user_id)->first();
        $vendor->name   = $params['name'];

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
