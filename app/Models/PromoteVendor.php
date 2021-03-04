<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoteVendor extends Model
{
    const REQUESTED     = 'Requested';
    const APPROVED      = 'Approved';
    const DECLINED      = 'Declined';
    const EXPIRED       = 'Expired';

    protected $table    = "promote_vendors";
    protected $fillable = ['vendor_id', 'PromoteOn', 'DateFrom', 'DateTo'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'Vendor_id');
    }
}
