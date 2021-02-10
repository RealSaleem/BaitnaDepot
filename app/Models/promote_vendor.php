<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class promote_vendor extends Model
{
    protected $table = "promote_vendors";
    protected $fillable = ['vendor_id','PromoteOn','DateFrom','DateTo'];

    public function User()
    {
        return $this->belongsTo(User::class,'Vendor_id');
    }
     
}
