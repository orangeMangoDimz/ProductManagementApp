<?php
namespace App\http\Modules\ProductCategory;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryRepository
{
    public function getAllProductCategory(): Collection
    {
        return ProductCategory::all();
    }
}

?>