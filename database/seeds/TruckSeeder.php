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
	    $trucks = factory(Truck::class, 25)->create();
    }
}
