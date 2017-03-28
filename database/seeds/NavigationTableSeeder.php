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
        $data = [[
            'title' => 'Home',
            'link' => '/',
            'haschild' => false
        ],[
        'title' => 'Products',
        'link' => '/products',
            'haschild' => true
    ],[
        'title' => 'Contact',
        'link' => '/contact',
            'haschild' => false
    ]];

        DB::table('navigation')->insert($data);
    }
}
