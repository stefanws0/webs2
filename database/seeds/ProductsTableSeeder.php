<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Jeans',
            'description' => 'dit is een spijkerbroek van het merk Armani',
            'category_id' => '2',
            'price' => '1000'],
            ['name' => 'Skinny',
                'description' => 'dit is een skinnybroek van het merk Furgato',
                'category_id' => '2',
                'price' => '2000'],
            ['name' => 'Baggy',
                'description' => 'dit is een baggybroek van het merk Saddle',
                'category_id' => '2',
                'price' => '700'],
            ['name' => 'Polo',
                'description' => 'dit is een polo van het merk Marco Polo',
                'category_id' => '1',
                'price' => '2000'],
            ['name' => 'Blouse',
                'description' => 'dit is een blouse van het merk Antony Morato',
                'category_id' => '1',
                'price' => '400'],
            ['name' => 'Shirt',
                'description' => 'dit is een shirt van het merk G-Star',
                'category_id' => '1',
                'price' => '20'],
            ['name' => 'Gala',
                'description' => 'dit is een galajurk van het merk Gerato',
                'category_id' => '3',
                'price' => '3000'],
            ['name' => 'Cerzato',
                'description' => 'dit is een casual jurk van het merk Getyho',
                'category_id' => '3',
                'price' => '300'],
            ['name' => 'Stand',
                'description' => 'dit is een Standaard jurk van het merk Gazelle',
                'category_id' => '3',
                'price' => '450'],
        ]);
    }
}
