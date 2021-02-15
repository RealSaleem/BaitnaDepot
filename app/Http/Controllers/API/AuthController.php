<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\VendorRequest;
use App\Http\Requests\Auth\ChangePassword;

class AuthController extends ApiBaseController
{
    public function login(Request $request)
    {
        // dd($request->all());
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // dd($validator->getMessageBag());
            // dd($validator->errors());
            return $this->FailResponse("Validations error", $validator->getMessageBag());
        }
        $email = $request['email'];
        $password = $request['password'];

        if (Auth::attempt(['email' => $email, 'password' => $password, 'type' => APP_USER])) {
            $user = Auth::user();
            $data = [
                'id'            => $user->id,
                'name'          => $user->name,
                'email'         => $user->email,
                'mobile'        => $user->mobile,
                'date_of_birth' => $user->date_of_birth,
                'token'         => $user->createToken('baitna-depot')->accessToken
            ];

            return $this->SuccessResponse('Logged in sucessfully', $data);
        } else {
            return $this->FailResponse('Invalid credentials');
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'name'              => 'required',
            'email'             => 'required|email|unique:users',
            'mobile'            => 'required|min:8|max:8',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->FailResponse("Validations error", $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['username'] = trim(strtolower($request->name));
        $input['type']  = APP_USER;
        $input['status']  = INACTIVE;
        $user = User::create($input);
        $token = $user->createToken('baitna-depot')->accessToken;

        $data = [
            'name'   => $user->name,
            'mobile' => $user->mobile,
            'email'  => $user->email,
            'token'  => $token 
        ];
        return $this->SuccessResponse('Account has been created successfully', $data);
    }

    public function JoinVendorRequest(Request $request)
    {
        $rules = [
            'name'              => 'required',
            'mobile'            => 'required|min:8|max:8'
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return $this->FailResponse("Validation error", $validator->errors());
        }

        $input = $request->all();
        $input['status'] = UNAPPROVE;
        if(VendorRequest::create($input)){
            return $this->SuccessResponse('Your request has been submitted successfully.', []);
        } else {
            return $this->FailResponse("Failed");
        }
    }

    public function updatePassword(ChangePassword $request)
    {
    	$changed_password = $request->handle();

        if($changed_password){
            return $this->SuccessResponse('Password has been chnaged successfully', []);
        } else {
            return $this->FailResponse(null, 'Something went wrong');
        }
    }
}
