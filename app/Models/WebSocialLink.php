<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSocialLink extends Model
{
	protected $fillable = ['facebook', 'twitter', 'snapchat', 'instagram', 'vendor_id'];
	protected $hidden 	= ['vendor_id', 'created_at', 'modified_at', 'deleted_at'];

}
