<?php

use Illuminate\Database\Seeder;
use App\Models\Day;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Day::truncate();
        
        $weekDays = [
        	['name_en' => 'Sunday', 'name_ar'	=> 'الأحد'],
        	['name_en' => 'Monday', 'name_ar'	=> 'الاثنين'],
        	['name_en' => 'Tuesday', 'name_ar'	=> 'الثلاثاء'],
        	['name_en' => 'Wednesday', 'name_ar'	=> 'الاربعاء'],
        	['name_en' => 'Thursday', 'name_ar'	=> 'الخميس'],
        	['name_en' => 'Friday', 'name_ar'	=> 'الجمعة'],
        	['name_en' => 'Saturday', 'name_ar'	=> 'السبت'],
        ];
        
        foreach($weekDays as $key => $value)
        {
        	$day = new Day();
        	$day->name_en 		= $value['name_en'];
        	$day->name_ar 		= $value['name_ar'];
        	$day->created_at 	= \Carbon\Carbon::now();
        	$day->updated_at 	= \Carbon\Carbon::now();

        	$day->save();
        }
    }
}
