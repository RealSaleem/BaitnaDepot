<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function getEcommerceVendors()
    {
       $vendors = Vendor::where('services', 'LIKE', '%1%')->get();
       return $vendors;
    }
}
