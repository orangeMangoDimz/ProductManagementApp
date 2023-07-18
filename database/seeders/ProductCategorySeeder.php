<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(ProductCategory::$productList as $product){
            ProductCategory::create([
                'name' => $product
            ]);
        }
    }
}
