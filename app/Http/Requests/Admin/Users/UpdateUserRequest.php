<?php

namespace App\Http\Requests\Admin\Users;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
            'name'      =>  ['required'],
            'mobile'    =>  ['required', 'numeric', 'digits_between:8,8'],
            'username'  =>  ['required', 'string',
                                Rule::unique('users', 'username')->ignore($params['id'])->where(function ($query) use ($params) {
                                    return $query->where('type',AppConstant::APP_USER);
                            })],
            'email'     =>  ['required', 'string', 'email', 'max:191',
                                Rule::unique('users', 'email')->ignore($params['id'])->where(function ($query) use ($params) {
                                    return $query->where('type', AppConstant::APP_USER);
                            })]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.digits_between' => trans('validation.custom.mobile.digits_between'),
        ];
    }

    public function handle($id){
        $params = $this->all();

        $user           	 = User::find($id);
        $user->name          = $params['name'];
        $user->username      = $params['username'];
        $user->mobile        = $params['mobile'];
        $user->email         = $params['email'];
        $user->date_of_birth = $params['date_of_birth'];
        $user->save();
    }
}
