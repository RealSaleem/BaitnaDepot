<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable		= ['title_en', 'title_ar', 'description', 'description_ar', 'type'];
    protected $hidden 	 	= ['created_at', 'modified_at' ];
}
