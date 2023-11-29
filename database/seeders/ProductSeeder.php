<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Product 1',
            'price' => 20,
            'quantity' => 20
        ]);

        DB::table('products')->insert([
            'name' => 'Product 2',
            'price' => 20,
            'quantity' => 40
        ]);
        DB::table('products')->insert([
            'name' => 'Product 3',
            'price' => 100,
            'quantity' => 80
        ]);
        DB::table('products')->insert([
            'name' => 'Product 4',
            'price' => 400,
            'quantity' => 40
        ]);
        DB::table('products')->insert([
            'name' => 'Product 5',
            'price' => 200,
            'quantity' => 45
        ]);
        DB::table('products')->insert([
            'name' => 'Shirt',
            'price' => 250,
            'quantity' => 80
        ]);
        DB::table('products')->insert([
            'name' => 'Pant',
            'price' => 400,
            'quantity' => 10
        ]);
        DB::table('products')->insert([
            'name' => 'Shari',
            'price' => 900,
            'quantity' => 40
        ]);
        DB::table('products')->insert([
            'name' => 'Panjabi',
            'price' => 800,
            'quantity' => 15
        ]);
        DB::table('products')->insert([
            'name' => 'Payjama',
            'price' => 200,
            'quantity' => 90
        ]);
    }
}
