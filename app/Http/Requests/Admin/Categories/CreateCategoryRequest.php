<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CreateCategoryRequest extends FormRequest
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
        return [
            'type'   => ['required'],
            'image'  => ['nullable','image','mimes:jpeg,jpg,png']
        ];
    }

    public function handle()
    {
        $this->validated();

        $params = $this->all();
        // $image_path = null;

        $category                   = new Category();
        $category->name             = $params['name'];
        $category->parent_id        = $params['parent_id'];
        $category->type             = $params['type'];
        $category->delivery_fees    = $params['delivery_fees'];
        $category->sort             = $params['sort'];

        if($this->hasFile('image'))
        {
            $image_path = $this->file('image')->store('category');
            $image_path = env('IMAGE_BASE_URL').$image_path;
            $category->image = $image_path;
        }

        $category->save();

        return $category;
    }
}