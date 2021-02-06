<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function getLocaleName()
	{
		$lang = \Lang::getLocale();
		if($lang == 'ar'){
			return $this->name_ar;
		}
		return $this->name_en;
	}
}
