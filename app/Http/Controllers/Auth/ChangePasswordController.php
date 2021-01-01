<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ChangePassword;

class ChangePasswordController extends Controller
{
    public function ShowChangePasswordForm()
    {
    	$route = 'change_password';
    	return view('auth.passwords.change_password', compact('route'));
    }

    public function changePassword(ChangePassword $request)
    {
    	$validated = $request->validated();
    	// dd($validated);
    	$request->handle();

    	return redirect()->route('change_password')->withSuccess(trans('toaster.password_changed_successfully'));
    }
}
