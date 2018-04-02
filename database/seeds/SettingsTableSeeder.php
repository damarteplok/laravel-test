<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Setting::create([

        	'site_name' => "AbsolutHaram",
        	'address' => "wkwkwkLand",
        	'contact_number' => '5555555',
        	'contact_email' => 'info@absolutharam.com'

        ]);
    }
}
