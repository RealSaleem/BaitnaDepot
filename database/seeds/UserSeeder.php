<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 		            => 'Irfan',
            'username'              => 'irfan',
            'email'                 => 'hirfan875@gmail.com',
            'password'              => '$2y$10$kzxnfvQcq.9IMs9XWPcP7ufdXMQ.4Z04gx.mbYm36evisYLBdcuzW', //123456789
            'type'                  => 1,
            'status' 	            => 0,
            'is_approved'           => 1,
            'created_at'            => \Carbon\Carbon::now(),
            'updated_at'            => \Carbon\Carbon::now()
        ]);
    }
}
