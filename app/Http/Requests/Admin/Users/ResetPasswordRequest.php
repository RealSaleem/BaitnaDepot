<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class ResetPasswordRequest extends FormRequest
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
            'user_id'   => ['required'],
            'password'  => ['required','confirmed']                
        ];
    }

    public function handle(){

        $params = $this->all();
        // dd($params);
        $user = User::find($params['user_id'])->update(['password' => bcrypt($params['password'])]);
        
        return $user;
    }
}
