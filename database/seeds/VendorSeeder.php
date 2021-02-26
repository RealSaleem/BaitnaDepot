<?php

use Illuminate\Database\Seeder;
use App\Models\Vendor;
use App\Helpers\AppConstant;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vendor::class, 1)->create();
        DB::table('users')->insert([
            'name' 		            => 'Irfan',
            'username'              => 'irfan',
            'email'                 => 'hirfan875@gmail.com',
            'password'              => bcrypt('admin'),
            'type'                  => AppConstant::VENDOR_USER,
            'status' 	            => 0,
            'is_approved'           => 1,
            'vendor_id'             => 1,
            'created_at'            => \Carbon\Carbon::now(),
            'updated_at'            => \Carbon\Carbon::now()
        ]);
    }
}