<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Vendor\Product\GetAllProductsRequest;
use App\Http\Requests\Vendor\Product\GetProductRequest;
use App\Http\Requests\Vendor\Product\CreateProductRequest;
use App\Http\Requests\Vendor\Product\UpdateProductRequest;
use App\Models\Color;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllProductsRequest $request)
    {
        $products = $request->handle();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Color::select('id','name','hex_code')->get();
        
        $data = [
            'colors' => $colors
        ];

        return view('products.forms.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        dd($request->all());
        $product = $request->handle();
        return redirect()->route('products.index')->withSuccess(\Lang::get('toaster.created_successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetProductRequest $request, $id)
    {
        $request->id = $id;
        $product     = $request->handle();

        return view('products.show', compact('product'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GetProductRequest $request, $id)
    {
        $request->id = $id;
        $product     = $request->handle();

        $colors = Color::select('id','name','hex_code')->get();
        $data = [
            'colors'    => $colors,
            'product'   => $product
        ];

        return view('products.forms.edit', $data);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $request['id']  = $id;
        $product        = $request->handle();

        return redirect()->route('products.index')->withSuccess(\Lang::get('toaster.updated_successfully'));
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