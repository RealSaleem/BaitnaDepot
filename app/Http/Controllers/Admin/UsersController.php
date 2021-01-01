<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Users\GetAllUsersRequest;
use App\Http\Requests\Admin\Users\CreateUserRequest;
use App\Http\Requests\Admin\Users\GetUserRequest;
use App\Http\Requests\Admin\Users\UpdateUserRequest;
use App\Http\Requests\Admin\Users\ResetPasswordRequest;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllUsersRequest $request)
    {
        $users = $request->handle();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = $request->handle();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetUserRequest $request, $id)
    {
        $user = $request->handle($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GetUserRequest $request, $id)
    {
        $user = $request->handle($id);
        return view('admin.users.forms.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        $user = $request->handle($id);
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->withSuccess(trans('toaster.deleted_successfully'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = $request->handle();
        
        $data = [];
        if($user){
            $data = [
                'success' => true,
                'message' => 'Password has been reset successfully'
            ];
            return response()->json($data);
        } else {
            $data = [
                'success' => false,
                'message' => 'Something went wrong'
            ];
            return response()->json($data);
        }
        // return view('admin.users.reset_password');
    }
}
