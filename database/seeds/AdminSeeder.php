<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' 			=> 'Admin',
            'email' 		=> 'admin@admin.com',
            'password'		=> bcrypt('admin'),
            'created_at'	=> \Carbon\Carbon::now(),
            'updated_at'	=> \Carbon\Carbon::now()
        ]);
    }
}
