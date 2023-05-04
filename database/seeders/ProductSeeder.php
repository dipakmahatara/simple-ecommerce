<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Redmi 10', 'subcategory_id' => 1, 'price' => 10000,   'description' => "Dummy Example", 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'MacBook Pro', 'subcategory_id' => 2, 'price' => 210000,   'description' => "Dummy Example", 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Vitamin A', 'subcategory_id' => 3, 'price' => 1300,   'description' => "Dummy Example", 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Nima Book', 'subcategory_id' => 4, 'price' => 120,   'description' => "Dummy Example", 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Scooter', 'subcategory_id' => 2, 'price' => 130,   'description' => "Dummy Example", 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
