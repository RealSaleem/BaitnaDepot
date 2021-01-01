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
            //
        ];
    }

    public function handle(){

        $params = $this->all();

        $truck          = new Truck;
        $truck->name    = $params['name'];
        $truck->save();

        return $truck;
    }
}
