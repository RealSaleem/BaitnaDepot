<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;
use App\Models\Admin;

class ChangePassword extends FormRequest
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

            'current_password'      => ['required', new MatchOldPassword],
            'new_password'          => ['required'],
            'confirm_new_password'  => ['required','same:new_password']
        ];
    }

    public function handle()
    {
        $params = $this->all();
        
        //if user logged in else admin
        if(Auth::check()){ 
            $id = Auth::user()->id;
            $user = User::find($id)->update(['password'=> Hash::make($params['confirm_new_password'])]);
        } else {
            $id = Auth()->guard('admin')->user()->id;
            $user = Admin::find($id)->update(['password'=> Hash::make($params['confirm_new_password'])]);
        }

        return $user;
    }
}
