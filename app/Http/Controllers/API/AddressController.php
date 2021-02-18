<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\API\UserAddress\AddAddress;

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
        $rules =[
            'user_id'       => 'required',
            'name_en'       => 'required',
            'name_ar'       => 'required',
            'area'          => 'required',
            'block'         => 'required',
            'street'        => 'required',
            'building'      => 'required',
            'floor'         => 'required',
            'civil_id'      => 'required',
            'other'         => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->FailResponse("Validation error", $validator->getMessageBag(), 200);
        }else{
                $address = new Address();
                $address->user_id   = $request->user_id;
                $address->name_en   = $request->name_en;
                $address->name_ar   = $request->name_ar;
                $address->area      = $request->area;
                $address->block     = $request->block;
                $address->street    = $request->street;
                $address->building  = $request->building;
                $address->floor     = $request->floor;
                $address->civil_id  = $request->civil_id;
                $address->other     = $request->other;
      $result = $address->save();
      if($result){
          return $this->SuccessResponse(trans('Address added successfully'), $result);
      }
        }}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $getaddress = Address::where('user_id',$request->user_id )->first();
        if($getaddress){
            return $this->SuccessResponse(trans('Successfully Get'), $getaddress);
        }


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
        $rules =[
            'user_id'       => 'required',
            'name_en'       => 'required',
            'name_ar'       => 'required',
            'area'          => 'required',
            'block'         => 'required',
            'street'        => 'required',
            'building'      => 'required',
            'floor'         => 'required',
            'civil_id'      => 'required',
            'other'         => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->FailResponse("Validation error", $validator->getMessageBag(), 200);
        }else {


            $updateAddress = Address::find($request->user_id);
            $updateAddress->name_ar = $request->name_ar;
            $updateAddress->name_en = $request->name_en;
            $updateAddress->area = $request->area;
            $updateAddress->block = $request->block;
            $updateAddress->street = $request->street;
            $updateAddress->building = $request->building;
            $updateAddress->floor = $request->floor;
            $updateAddress->civil_id = $request->civil_id;
            $updateAddress->other = $request->other;
            $result = $updateAddress->save();

            if ($result) {
                return $this->SuccessResponse(trans('Address Successfully Updated'), $result);
            }
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
        //
    }
}
