<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\ProductService;
use App\http\Modules\ProductCategory\ProductCategoryService;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    protected ProductService $service;
    protected ProductCategoryService $productsCategoryService;

    public function __construct(Productservice $service, ProductCategoryService $productCategoryService)
    {
        $this->service = $service;
        $this->productsCategoryService = $productCategoryService;
    }

    public function create()
    {
        $products = $this->service->getAllProducts();
        $productsCategory = $this->productsCategoryService->getAllProductCategory();
        return view('product.create', compact('productsCategory', 'products'));
    }

    public function edit($id)
    {
        $products = Product::find($id);
        $productCategories = $this->productsCategoryService->getAllProductCategory();
        return view('product.edit', compact(['products', 'productCategories']));
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('cover'))
        {
            $validated['cover'] = $this->service->storeImageCover($request->file('cover'));
        }

        $stored = $this->service->storeProduct($validated);

        return $stored
        ? redirect(route('home.page'))->with('success', 'Successfully Create a New Product!')
        : redirect()->back()->with('error', 'Oops!, Something is Wrong!');
    }
}
