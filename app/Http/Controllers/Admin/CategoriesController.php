<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Categories\CreateCategoryRequest;
use App\Http\Requests\Admin\Categories\GetAllCategoryRequest;
use App\Http\Requests\Admin\Categories\GetCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllCategoryRequest $request)
    {
        $categories = $request->handle();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GetAllCategoryRequest $request)
    {
        $categories = $request->handle();
        return view('admin.categories.forms.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $request->handle();


            return redirect()->route('admin.categories.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GetCategoryRequest $request, $id)
    {
        $request->id = $id;
        $category    = $request->handle();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GetCategoryRequest $request, $id)
    {
        $request->id = $id;
        $category = $request->handle();

        $allRequest = new GetAllCategoryRequest();
        $categories = $allRequest->handle();

        return view('admin.categories.forms.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category    = $request->handle();
        return redirect()->route('admin.categories.index')->withSuccess('Record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        \App\Helpers\Helper::deleteAttachment($category->image);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('error',\Lang::get('toaster.deleted_successfully'));
    }
}
