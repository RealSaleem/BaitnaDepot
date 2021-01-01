<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Trucks\GetAllTrucks;
use App\Http\Requests\Admin\Trucks\CreateTruck;
use App\Http\Requests\Admin\Trucks\UpdateTruck;
use App\Models\Truck;

class TrucksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllTrucks $request)
    {
        $trucks = $request->handle();
        return view('admin.trucks.index', ['trucks' => $trucks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trucks.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTruck $request)
    {
        $truck = $request->handle();
        return redirect()->route('admin.heavy_trucks.index')->withSuccuss(trans('toaster.created_successfully'));
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
        $truck = Truck::find($id);

        return view('admin.trucks.forms.edit', ['truck' => $truck]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTruck $request, $id)
    {
        $request->id = $id;
        $truck = $request->handle();
        return redirect()->route('admin.heavy_trucks.index')->withSuccuss(trans('toaster.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Truck::find($id)->delete();
        return redirect()->route('admin.heavy_trucks.index')->withSuccuss(trans('toaster.deleted_successfully'));
    }
}
