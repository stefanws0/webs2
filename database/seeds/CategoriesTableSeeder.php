<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Pants'],
            ['name' => 'Shirt'],
            ['name' => 'Dress']
        ];

        DB:table('categories')->insert($categories);
    }
}
