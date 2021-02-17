<?php

namespace App\Http\Controllers\Admin\ContactUsDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ContactUsDetails = ContactUs::all();
        return  view('admin.contact_us.index')->with(compact('ContactUsDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.contact_us.form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    $ContactUsDetails =new ContactUs();
                    $ContactUsDetails->email        = $request->email;
                    $ContactUsDetails->mobile       = $request->phone;
                    $ContactUsDetails->address      = $request->address;
                    $ContactUsDetails->facebook     = $request->facebook;
                    $ContactUsDetails->twitter      = $request->twitter;
                    $ContactUsDetails->instagram    = $request->instagram;
                    $ContactUsDetails->snapchat     = $request->snapchat;
        $result =   $ContactUsDetails->save();
        if($result)
        {
            return  redirect()->route('admin.ContactUsDetails.index')->withSuccess('Contact Us Details saved');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GetContactUsDetail = ContactUs::find($id);


        return  view('admin.contact_us.form.edit')->with(compact('GetContactUsDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                    $UpdateDetails = ContactUs::find($id);
                    $UpdateDetails->email        = $request->email;
                    $UpdateDetails->mobile       = $request->phone;
                    $UpdateDetails->address      = $request->address;
                    $UpdateDetails->facebook     = $request->facebook;
                    $UpdateDetails->twitter      = $request->twitter;
                    $UpdateDetails->instagram    = $request->instagram;
                    $UpdateDetails->snapchat     = $request->snapchat;
        $result =   $UpdateDetails->save();
        if($result)
        {
            return  redirect()->route('admin.ContactUsDetails.index')->withSuccess('Contact Us Details Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                     $DeleteContactUsDetails = ContactUs::find($id);
           $result = $DeleteContactUsDetails->delete();
           if($result)
           {
               return  redirect()->route('admin.ContactUsDetails.index')->withErrors('Detail Deleted.');
           }

    }
}
