<?php

use Illuminate\Database\Seeder;
use App\Models\Truck;
use Illuminate\Support\Facades\DB;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truck::factory()
	       //  ->times(20)
	       //  ->create();

	    // factory(\App\Models\Truck::class, 10)->create();

	    DB::table('trucks')->insert([
            'name_en'       => Str::random(10),
            'name_ar'       => Str::random(10),
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
    }
}
