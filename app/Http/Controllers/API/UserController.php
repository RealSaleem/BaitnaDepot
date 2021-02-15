<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends ApiBaseController
{
    public function profile(Request $request)
    {
        $user  = Auth::user();

        $data = [
            'id'            => $user->id,
            'name'          => $user->name,
            'mobile'        => $user->mobile,
            'email'         => $user->email,
            'date_of_birth' => $user->date_of_birth,
            'no_of_orders'  => (int) null,
            'no_of_request' => (int) null
        ];
        return $this->SuccessResponse('Profile loaded successfully', $data);
    }

    public function updateProfile(Request $request)
    {
        $user  = Auth::user();
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'mobile'    => 'required|min:8|max:8'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->FailResponse("Validation error", $validator->getMessageBag());
        }

        $input = $request->all();
        $user->name     = $input['name'];
        $user->mobile   = $input['mobile'];
        // $user->email    = $input['email'];
        $user->save();

        return $this->SuccessResponse('Profile has been updated suucessfully', []);
    }
}
