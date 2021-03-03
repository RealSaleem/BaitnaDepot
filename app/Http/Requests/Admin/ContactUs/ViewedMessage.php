<?php

namespace App\Http\Requests\Admin\ContactUs;

use App\Helpers\AppConstant;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ContactUsMsg;

class ViewedMessage extends FormRequest
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

    public function handle($id){
        $contactus = ContactUsMsg::find($id);
        $contactus->status = 1;
        $contactus->save();

        return $contactus;
    }
}
