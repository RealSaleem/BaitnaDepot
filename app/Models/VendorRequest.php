<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorRequest extends Model
{
    protected $fillable = ['name', 'mobile', 'services', 'trucks', 'message', 'status'];
}
