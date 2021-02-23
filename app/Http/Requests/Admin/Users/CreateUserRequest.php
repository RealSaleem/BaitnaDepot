<?php

namespace App\Http\Requests\Admin\Users;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class CreateUserRequest extends FormRequest
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
            'password'  =>  ['required','confirmed'],
            'mobile'    =>  ['required', 'numeric','min:8'],
            'username'  =>  ['required', 'string',
                                Rule::unique('users', 'username')->where(function ($query) use ($params) {
                                    return $query->where('type', AppConstant::APP_USER);
                            })],
            'email'     =>  ['required', 'string', 'email', 'max:191',
                                Rule::unique('users', 'email')->where(function ($query) use ($params) {
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
            'mobile.min' => trans('validation.custom.mobile.digits_between'),
            'mobile.max' => trans('validation.custom.mobile.digits_between')
        ];
    }

    public function handle(){
        $params = $this->all();

        $user           = new user;
        $user->name          = $params['name'];
        $user->username      = $params['username'];
        $user->mobile        = $params['mobile'];
        $user->email         = $params['email'];
        $user->date_of_birth = $params['date_of_birth'];
        $user->password      = bcrypt($params['password']);
        $user->type          = AppConstant::APP_USER;
        $user->save();
    }
}
