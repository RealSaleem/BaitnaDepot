<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\ContactUs;

class AddressController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = $request->user_id;
        $addresses = Address::with('user')->where('user_id', $user_id)->get();

        if ($addresses->IsEmpty()) {
            return $this->FailResponse('No record found', [], 200);
        }

        // $array = [];
        // foreach($addresses as $key => $value) {
        //     $array[$key]['id']       = $value->id;
        //     $array[$key]['name_en']  = $value->name_en;
        //     $array[$key]['name_ar']  = $value->name_ar;
        //     $array[$key]['area']     = $value->area;
        //     $array[$key]['block']    = $value->block;
        //     $array[$key]['street']   = $value->street;
        //     $array[$key]['building'] = $value->building;
        //     $array[$key]['floor']    = $value->floor;
        //     $array[$key]['civil_id'] = $value->civil_id;
        //     $array[$key]['other']    = $value->other;
        // }

        return $this->SuccessResponse(trans('response.address_loaded_successfully'), $addresses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
