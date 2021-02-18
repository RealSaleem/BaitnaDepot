<?php

namespace App\Http\Requests\Admin\Users;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class GetAllUsersRequest extends FormRequest
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
        $params = $this->all();

        $baseQuery = User::where('type', AppConstant::APP_USER);

        if(isset($params) && $params != null){

            if(isset($params['username'])){
                $baseQuery = $baseQuery->where('username', 'LIKE', '%'.$params['username'].'%');
            }

            if(isset($params['mobile'])){
                $baseQuery = $baseQuery->where('mobile', 'LIKE', '%'.$params['mobile'].'%');
            }

            if(isset($params['email'])){
                $baseQuery = $baseQuery->where('email', 'LIKE', '%'.$params['email'].'%');
            }
        }

        $users = $baseQuery->get();
        return $users;
    }
}
