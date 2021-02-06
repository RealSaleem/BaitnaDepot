<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use SoftDeletes;

    protected $fillable  = ['title_en', 'title_ar', 'image', 'sort'];
    protected $hidden 	 = ['created_at', 'updated_at', 'deleted_at'];
}
