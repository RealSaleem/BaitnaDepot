<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class AppConstant
{
    const APP_USER              = 2;
    const VENDOR_USER           = 1;
    const NEWED                 = 'new';
    const VIEWED                = 'viewed';
    const APPROVED              = 1;
    const UNAPPROVED            = 0;
    const DECLINED              = 2;
    const OPEN                  = 1;
    const CLOSE                 = 0;
    const INACTIVE              = 0;
    const ACTIVE                = 1;
    const YES                   = 1;
    const NO                    = 0;
    const NOT_AVAILABLE         = 'Not-Available';
    const AVAILABLE             = 'Available';
    const ECOMMERCESERVICE      = 1;
    const CONTRACTORSERVICE     = 2;
    const TRUCKSERVICE          = 3;
}
