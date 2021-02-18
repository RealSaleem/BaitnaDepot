<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{

    protected $table = "notifications";

    public function getImageAttribute()
    {
        $image = \App\Helpers\Helper::getImage($this->attributes['image']);
        return $image;
    }



}
