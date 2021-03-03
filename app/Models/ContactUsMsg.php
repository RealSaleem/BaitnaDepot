<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsMsg extends Model
{
    protected  $table = "contact_us_messages";

    const NEWED                 = 'New';
    const VIEWED                = 'Viewed';
}
