<?php

namespace App\Http\Requests\WorkingHours;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Day;
use App\Models\ContractorWorkingHour;

class InitContractorWorkingHours extends FormRequest
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

    public function handle($vendor_id)
    {
        $params = $this->all();
        $days = Day::all();

        foreach($days as $day)
        {
            $working_hours = new ContractorWorkingHour();
            $working_hours->vendor_id   = $vendor_id;
            $working_hours->day_id      = $day->id;
            $working_hours->status      = CLOSE;
            $working_hours->start_time  = null;//\Carbon\Carbon::now();
            $working_hours->end_time    = null;//\Carbon\Carbon::now();
            $working_hours->save();
        }

        $working_times = ContractorWorkingHour::with('day')->where('vendor_id', $vendor_id)->get();
        return $working_times;
    }
}
