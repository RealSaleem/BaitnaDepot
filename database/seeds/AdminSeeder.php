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
            'password'		=> '$2y$10$kzxnfvQcq.9IMs9XWPcP7ufdXMQ.4Z04gx.mbYm36evisYLBdcuzW', //123456789
            'created_at'	=> \Carbon\Carbon::now(),
            'updated_at'	=> \Carbon\Carbon::now()
        ]);
    }
}
