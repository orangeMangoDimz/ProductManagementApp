<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = ProductCategory::all();

        foreach($products as $product){
            Product::create([
                "cover" =>  "Example-".$product->id.".jpg",
                "title" => "Product Title",
                "product_category_id" => $product->id,
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure",
                "stock" => 150,
                "price" => 279000
            ]);
        }
    }
}
