<?php

namespace App\Http\Requests\Admin\Trucks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Truck;

class UpdateTruck extends FormRequest
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
            'name_en'  => ['required']
        ];
    }

    public function handle(){

        $id = $this->id;
        $params = $this->all();

        $truck              = Truck::find($id);
        $truck->name_en     = $params['name_en'];
        $truck->name_ar     = $params['name_ar'];
        $truck->save();

        return $truck;
    }
}
