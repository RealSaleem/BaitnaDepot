<?php

namespace App\Http\Requests\Admin\PromoCode;

use App\Models\promo_code;
use Illuminate\Foundation\Http\FormRequest;

class GetPromoRequest extends FormRequest
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
            'code_name'     => ['required'],
            'valid_from'    => ['required'],
            'valid_till'    => ['required'],
            'num_of_user'   => ['required'],
            'promo_type'    => ['required']
           
        ];
    }

    public function handle()
    {  
      $PromoReq = $this->all();
      $id = $PromoReq['id'];

      if($PromoReq['promo_type']== 1){
        $PromoType = "Percentage";
      }
      
      if($PromoReq['promo_type']== 2){
        $PromoType = "Price";
      }

      $promo_code                     = promo_code::find($id);
      $promo_code->name               = $PromoReq['code_name'];
      $promo_code->valid_from         = $PromoReq['valid_from'];
      $promo_code->valid_til          = $PromoReq['valid_till'];
      $promo_code->type               = $PromoType;
      $promo_code->value              = $PromoReq['promo_value'];
      $promo_code->num_of_user        = $PromoReq['num_of_user'];
      $result = $promo_code->save();

      if($result)
      {
        return $promo_code;
      }
    }
}
