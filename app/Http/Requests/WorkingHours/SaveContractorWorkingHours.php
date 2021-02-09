<?php

namespace App\Http\Requests\WorkingHours;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\ContractorWorkingHour;

class SaveContractorWorkingHours extends FormRequest
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

        $working_hour_ids = $params['working_hours']['hour_row_ids'];

        for($a=0; $a<=sizeof($working_hour_ids)-1; $a++)
        {
           
        }
        exit;
        // dd($params);
    }
}
