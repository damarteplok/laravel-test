<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        App\Category::create([

            'name' => 'History'

        ]);

        App\Category::create([

            'name' => 'News'

        ]);  

        App\Category::create([

            'name' => 'Artist'

        ]);  

        App\Category::create([

            'name' => 'Video'

        ]); 

        App\Category::create([

            'name' => 'Paket'

        ]);   
    }
}
