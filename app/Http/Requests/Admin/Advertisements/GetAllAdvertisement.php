<?php

namespace App\Http\Requests\Admin\Advertisements;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Advertisement;

class GetAllAdvertisement extends FormRequest
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

    public function handle()
    {
        $params = $this->all();

        $ads = Advertisement::all();
        return $ads;
    }
}
