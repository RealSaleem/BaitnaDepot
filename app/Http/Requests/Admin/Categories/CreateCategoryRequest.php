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
            'name_en'   => ['required','unique:categories'],
            'name_ar'   => ['required','unique:categories'],
            'type'      => ['required'],
            'image'     => ['nullable','image','mimes:jpeg,jpg,png'],
        ];
    }

    public function handle()
    {
        $this->validated();

        $params = $this->all();

                $category                   = new Category();
                $category->name_en          = $params['name_en'];
                $category->name_ar          = $params['name_ar'] ?? $params['name_en'];
                $category->parent_id        = $params['parent_id'];
                $category->type             = $params['type'];
                $category->delivery_fees    = $params['delivery_fees'];
                $category->sort             = $params['sort'];

                if($this->hasFile('image'))
                {
                    $image_path = $this->file('image')->store('uploads/images');
                    $category->image = $image_path;
                }

                $category->save();

                return $category;






    }
}
