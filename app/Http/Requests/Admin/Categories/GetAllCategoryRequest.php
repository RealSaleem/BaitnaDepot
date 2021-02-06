<?php

namespace App\Http\Requests\Admin\Categories;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class GetAllCategoryRequest extends FormRequest
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
        ];
    }

    public function handle(){

        $params = $this->all();

        // $categories = Category::with(['children','parent'])->paginate(\Config::get('app.pagination_per_page'));
        $categories = Category::with(['children','parent'])->get();

        return $categories;
    }
}
