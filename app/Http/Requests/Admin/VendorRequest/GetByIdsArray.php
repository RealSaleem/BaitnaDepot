<?php

namespace App\Http\Requests\Admin\VendorRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;

class GetByIdsArray extends FormRequest
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
            'categories' = array;
        ];
    }

    public function handle(){

        $params = $this->all();
        $categories_ids = $params['categories'];
        $categories = Category::with(['children','parent'])whereIn('type', $categories_ids)->get();

        return $categories;
    }
}
