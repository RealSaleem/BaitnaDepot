<?php

namespace App\Http\Controllers\Admin\Advertisements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Requests\Admin\Advertisements\GetAllAdvertisement;
use App\Http\Requests\Admin\Advertisements\CreateAdvertisement;
use App\Http\Requests\Admin\Advertisements\UpdateAdvertisement;
Use Alert;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllAdvertisement $request)
    {
        $advertisements = $request->handle();
        return view('admin.advertisement_banners.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement_banners.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdvertisement $request)
    {
        $adv = $request->handle();
        return redirect()->route('admin.advertisements.index')->with('success', \Lang::get('toaster.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('admin.advertisement_banners.forms.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisement $request, $id)
    {
        $adv = $request->handle();
        return redirect()->route('admin.advertisements.index')->with('success', \Lang::get('toaster.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);
        \App\Helpers\Helper::deleteAttachment($advertisement->image);
        $result =  $advertisement->delete();

        if($result){
            return redirect()->back()->with('error',\Lang::get('toaster.deleted_successfully'));
        }
    }
}
