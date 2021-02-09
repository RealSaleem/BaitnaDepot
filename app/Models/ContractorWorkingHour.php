<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractorWorkingHour extends Model
{
    protected $fillable = ['vendor_id', 'day_id', 'status', 'start_time', 'end_time'];
    protected $hidden 	= ['created_at', 'updated_at'];

    public function day(){

    	return $this->belongsTo(Day::class);
    }
}
