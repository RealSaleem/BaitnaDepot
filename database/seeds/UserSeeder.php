<?php

use App\Helpers\AppConstant;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' 		            => 'Irfan',
        //     'username'              => 'irfan',
        //     'email'                 => 'hirfan875@gmail.com',
        //     'password'              => bcrypt('admin'),
        //     'type'                  => AppConstant::VENDOR_USER,
        //     'status' 	            => 0,
        //     'is_approved'           => 1,
        //     'vendor_id'             => 1,
        //     'created_at'            => \Carbon\Carbon::now(),
        //     'updated_at'            => \Carbon\Carbon::now()
        // ]);
        factory(User::class, 25)->create();
    }
}
