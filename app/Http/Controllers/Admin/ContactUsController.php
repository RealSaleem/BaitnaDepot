<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\ContactUs;
use App\Mail\ContactUs\ContactUsMail;
use App\Http\Requests\Admin\ContactUs\GetAll;
use App\Http\Requests\Admin\ContactUs\Get;
use App\Http\Requests\Admin\ContactUs\ViewedMessage;

class ContactUsController extends Controller
{
    public function index(GetAll $request){

        $contactus_messages = $request->handle();
        return view('admin.contactus-msg.index', ['contactus_messages' => $contactus_messages]);
    }

    public function get(Get $request, $id){

        $contact = $request->handle($id);
        return view('admin.contactus-msg.show', ['contact' => $contact]);
    }

    public function viwedMessage(ViewedMessage $request, $id){
        $contact = $request->handle($id);

        return redirect()->back()->withSuccess('Message has been viewed');
    }

    public function replyform($id)
    {
        $User = ContactUs::find($id);

        return view('admin.contactus-msg.reply', ['user' => $User]);
    }

    public function reply(Request $ReplyReq)
    {
        $data = [
            'email'     => $ReplyReq->email,
            'body'      => $ReplyReq->message
        ];
        $email = $ReplyReq->email;
        $SendMail =  Mail::to($email)->send(new ContactUsMail($data));

        return redirect()->back()->withSuccess('Reply has been send to the user');

    }
}
