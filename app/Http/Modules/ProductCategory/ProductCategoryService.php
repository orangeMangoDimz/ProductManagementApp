<?php

namespace App\http\Modules\ProductCategory;

use Illuminate\Database\Eloquent\Collection;

class ProductCategoryService
{
    protected ProductCategoryRepository $repository;

    public function __construct(ProductCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllProductCategory(): Collection
    {
        return $this->repository->getAllProductCategory();
    }
}

?>