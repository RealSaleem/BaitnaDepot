<?php

namespace App\Http\Requests\Admin\ContactUs;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ContactUs;

class GetAll extends FormRequest
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

        $baseQuery = ContactUs::query();

        if($params != null && $params['status'] != null){
            $messages = $baseQuery->where('status', $params['status']);
        }

        $messages = $baseQuery->get();

        return $messages;
    }
}
