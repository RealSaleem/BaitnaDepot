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
// dd($params);
        $working_hour_ids = $params['hour_row_ids'];

        foreach($working_hour_ids as $key => $value)
        {
            $working_hour = ContractorWorkingHour::find($params['hour_row_ids'][$key]);
            $working_hour->status       = $params['status'][$key];
            $working_hour->start_time   = $params['start_times'][$key];
            $working_hour->end_time     = $params['end_times'][$key];
            $working_hour->save();
        }
    }
}