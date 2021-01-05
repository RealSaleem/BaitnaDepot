<?php

namespace App\Http\Requests\Admin\Trucks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Truck;

class CreateTruck extends FormRequest
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
            'name_en' => 'required'
        ];
    }

    public function handle()
    {
        $params = $this->all();

        $truck          = new Truck;
        $truck->name_en = $params['name_en'];
        $truck->name_ar = $params['name_ar'] ?? $params['name_en'];
        $truck->save();

        return $truck;
    }
}
