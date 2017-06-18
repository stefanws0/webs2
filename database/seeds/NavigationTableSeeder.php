<?php

use Illuminate\Database\Seeder;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navigation')->insert([
            ['title' => 'Home',
            'hasChild' => false,
                'link' => '/'
            ],
            [
                'title' => 'Products',
                'hasChild' => true,
                'link' => '/products'
            ],
            [
                'title' => 'Contact',
                'hasChild' => false,
                'link' => '/contact'
            ]
            ]);
    }
}
