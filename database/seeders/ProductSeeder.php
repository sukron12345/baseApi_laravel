<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        Product::create([
            'name' => 'Google Pixel 5',
            'price' => 500000,
            'sku' => 'GOPIX5',
            'qty' => 100,
            'description' => 'flagship phone',
            'min_order_qty' => 1,
            'mark_is_new' => 1,
            'is_published' => 1,
            'user_id' => $user->id,
            'meta' => [
                'title' => 'Google pixel 5 Murah',
                'keyword' => 'Google pixel 5 Murah keyword',
            ],
        ]);
    }
}
