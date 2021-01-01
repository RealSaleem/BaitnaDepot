<?php

namespace App\Http\Requests\Admin\Trucks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Truck;

class GetAllTrucks extends FormRequest
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
        $trucks = Truck::get();

        return $trucks;
    }
}
