<?php

use Illuminate\Database\Seeder;

class ContactUsDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_us_details')->insert([
            'email' 		     => 'email@test.com',
            'mobile'             => 02166373,
            'address'            => 'A70,Karachi Pakistan',
            'facebook'           => 'www.facebook.com',
            'twitter'            => 'www.twitter.com',
            'instagram' 	     => 'www.instagram.com',
            'snapchat'           => 'www.snapchat.com',
            'created_at'         => \Carbon\Carbon::now(),
            'updated_at'         => \Carbon\Carbon::now()
        ]);
    }
}
