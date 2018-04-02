<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     	$user = App\User::create([
     	

     		'name' => 'admin',
     		'email' => 'bae@suzy.me',
     		'password' => bcrypt('password'),
            'admin' => 1

     	]);   

        App\Profile::create([

            'user_id' => $user->id,
            'avatar' => '/uploads/avatars/xiyeon.jpg',
            'about' => 'sauhduashdsauidhsaiudhsaiudh',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'

        ]);   
    }
}
