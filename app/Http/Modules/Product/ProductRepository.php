<?php
namespace App\http\Modules\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function getAllProducts(): LengthAwarePaginator
    {
        return Product::paginate(5);
    }

    public function storeProduct(array $data): Product
    {
        return Product::create($data);
    }
}

?>