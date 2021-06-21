<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::first();
        $tag = Tag::first();

        $productTag = ProductTag::create([
            'product_id' => $product->id,
            'tag_id' => $tag->id,
        ]);
    }
}
