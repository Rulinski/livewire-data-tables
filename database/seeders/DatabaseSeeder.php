<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Vital User',
            'email' => 'vital@example.com',
            'password' => bcrypt('password')
        ]);

        Store::create([
            'name' => 'MLM Industries',
            'user_id' => 1,
        ]);

        Product::create(['name' => 'Energy Drink', 'store_id' => 1]);
        Product::create(['name' => 'Water Purifier', 'store_id' => 1]);
        Product::create(['name' => 'Toothpaste', 'store_id' => 1]);
        Product::create(['name' => 'Magic Bracelet', 'store_id' => 1]);

        Order::factory()->count(705)->create(['product_id' => '1']);
        Order::factory()->count(604)->create(['product_id' => '2']);
        Order::factory()->count(503)->create(['product_id' => '3']);
        Order::factory()->count(402)->create(['product_id' => '4']);

        $user->todos()->createMany([
            [ 'name' => 'Wash my bike'],
            [ 'name' => 'Jump on the trampoline' ],
            [ 'name' => 'Burn ants with glass' ],
            [ 'name' => 'Put a card in my spokes' ],
        ]);

    }
}
