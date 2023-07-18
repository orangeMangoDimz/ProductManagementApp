<?php
namespace App\http\Modules\Product;

use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    protected ProductRepository $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProducts(): LengthAwarePaginator
    {
        return $this->repository->getAllProducts();
    }

    public function storeProduct(array $data): Product
    {
        return $this->repository->storeProduct($data);
    }

    public function storeImageCover(UploadedFile $upload): String
    {
        $path = $upload->getClientOriginalName();
        $originalName = pathinfo($path, PATHINFO_FILENAME);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
    
        $fileName = $originalName.'_'.time().'_'.$extension;
        $upload->move(public_path('images/product/'), $fileName);
    
        return $fileName;
    }
}

?>