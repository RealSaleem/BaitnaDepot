<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactUs\GetAll;
use App\Http\Requests\Admin\ContactUs\Get;
use App\Http\Requests\Admin\ContactUs\ViewedMessage;

class ContactUsController extends Controller
{
    public function index(GetAll $request){

    	$contactus_messages = $request->handle();
    	return view('admin.contactus.index', ['contactus_messages' => $contactus_messages]);
    }

    public function get(Get $request, $id){

    	$contact = $request->handle($id);
    	return view('admin.contactus.show', ['contact' => $contact]);
    }

    public function viwedMessage(ViewedMessage $request, $id){
    	$contact = $request->handle($id);

    	return redirect()->back()->withSuccess('Message has been viewed');
    }
}
