<?php

namespace App\Http\Requests\Admin\PromoCode;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\promo_code;

class GetAllPromoCode extends FormRequest
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
        $parm = $this->all();
        $PromoCode = promo_code::all();
        return $PromoCode;
    }
}
