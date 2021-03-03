<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\ContactUsMsg;
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
        $User = ContactUsMsg::find($id);

        return view('admin.contactus-msg.reply')->with(compact('User'));
    }

    public function reply(Request $ReplyReq)
    {
        $email = $ReplyReq->email;
        $data = [
            'email'     => $ReplyReq->email,
            'body'      => $ReplyReq->message
        ];
        $SendMail =  Mail::to($email)->send(new ContactUsMail($data));
        if($SendMail){
            return redirect()->setTargetUrl('admin/contact_us_messages')->with('success','Reply has been send to the user');
        }
    }
}
