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

    public function getProductById(String $id): Product
    {
        return Product::find($id);
    }

    public function updateProduct(String $id, array $data): bool
    {
        return Product::where('id', $id)->update($data);
    }

    public function deleteProductById(String $id)
    {
        return Product::destroy($id);
    }

    public function deleteProductQuantity(String $id, String $quantity)
    {
        $product = Product::find($id);
         $newQuantity = (int) $product->stock - (int) $quantity;
        Product::where('id', $id)->update(['stock' => $newQuantity]);
    }
}

?>