<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $params = $this->all();
        return [
            // 'name_en'   => ['required', 'unique:categories,name_en'.$params['id']],
            'name_en'   =>  ['required',
                                Rule::unique('categories', 'name_en')->ignore($params['id'])
                            ], 
            'name_ar'   =>  Rule::unique('categories', 'name_ar')->ignore($params['id']), 
            'type'      =>  ['required'],
            'image'     =>  ['nullable','image','mimes:jpeg,jpg,png']
        ];
    }

    public function handle()
    {
        $this->validated();

        $params = $this->all();
        $id = $params['id'];

        // $image_path = null;

        $category                   = Category::find($id);
        $category->name_en          = $params['name_en'];
        $category->name_ar          = $params['name_ar'] ?? $params['name_en'];
        $category->parent_id        = $params['parent_id'];
        $category->type             = $params['type'];
        $category->delivery_fees    = $params['delivery_fees'];
        $category->sort             = $params['sort'];

        if($this->hasFile('image') && isset($params['image']))
        {
            // $image = $this->file('image');
            $image_path = $this->file('image')->store('uploads/images');
            $category->image = $image_path;
        } elseif($params['hidden_image'] == null) {
            \App\Helpers\Helper::deleteAttachment($category->image);
            $category->image        = null;
        }

        $category->save();

        return $category;
    }
}
