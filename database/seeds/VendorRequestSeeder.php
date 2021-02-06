<?php

use Illuminate\Database\Seeder;
use App\Models\VendorRequest;

class VendorRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(VendorRequest::class, 20)->create();
    }
}
