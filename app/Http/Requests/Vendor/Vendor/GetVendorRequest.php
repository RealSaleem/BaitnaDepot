<?php

namespace App\Http\Requests\Vendor\Vendor;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Auth;

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
        $user_id = Auth::user()->id;
        $user = User::with('vendor')->find($user_id);

        return $user;
    }
}
