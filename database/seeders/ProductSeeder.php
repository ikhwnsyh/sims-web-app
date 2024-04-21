<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'Baju Olahraga', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'ATK', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Xiaomi Redmi Note 7', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Xiaomi Redmi Note 6', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Xiaomi Redmi Note 5', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Crockickle', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Mechanical Keyboard ', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Kipas Angin', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
            ['name' => 'Mousepad', 'category_id' => rand(1, 2), 'sell_price' => $sellPrice = fake()->randomNumber(6, true), 'buy_price' => ($sellPrice * 30) / 100, 'stock' => rand(10, 100)],
        ])->each(function ($products) {
            Product::create($products);
        });
    }
}
