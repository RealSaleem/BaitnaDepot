<?php

namespace App\Http\Controllers\Admin\Promo_Code;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PromoCode\CreatePromoCode;
use App\Http\Requests\Admin\PromoCode\GetAllPromoCode;
use App\Http\Requests\Admin\PromoCode\GetPromoRequest;
use App\Models\promo_code;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllPromoCode $request)
    {
            $PromoCode = $request->handle();
        return view('admin.promo_code.index')->with(compact('PromoCode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promo_code.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePromoCode $request)
    {
         $promo =  $request->handle();
        return redirect()->route('admin.promo_code.index')->with('success', \Lang::get('toaster.created_successfully'));

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
        $promo_code = promo_code::find($id);
        return view('admin.promo_code.forms.edit', compact('promo_code'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GetPromoRequest $request, $id)
    {
                    $Promo = $request->handle();

                    if($Promo== true)
                    {
                        return redirect()->route('admin.promo_code.index')->with('success', \Lang::get('toaster.updated_successfully'));
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
                    $promo_code = promo_code::find($id);
                    $promo_code->delete();

        return redirect()->back()->withError(trans('toaster.deleted_successfully'));
    }
}
