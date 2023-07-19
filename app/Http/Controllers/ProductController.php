<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\ProductService;
use App\http\Modules\ProductCategory\ProductCategoryService;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;

class ProductController extends Controller
{
    protected ProductService $service;
    protected ProductCategoryService $productsCategoryService;

    public function __construct(Productservice $service, ProductCategoryService $productCategoryService)
    {
        $this->service = $service;
        $this->productsCategoryService = $productCategoryService;
    }

    public function show($id)
    {
        $product = $this->service->getProductById($id);
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $products = $this->service->getAllProducts();
        $productsCategory = $this->productsCategoryService->getAllProductCategory();
        return view('product.create', compact('productsCategory', 'products'));
    }

    public function edit($id)
    {
        $products = $this->service->getProductById($id);
        $productCategories = $this->productsCategoryService->getAllProductCategory();
        return view('product.edit', compact(['products', 'productCategories']));
    }

    public function update($id, ProductRequest $request)
    {
        $product = $this->service->getProductById($id);
        $validated = $request->validated();
        $request->has('cover') ? $validated['cover'] = $this->service->storeImageCover($request->file('cover')) : '';

        $updated = $this->service->updateProduct($product->id, $validated);

        return $updated
        ? redirect(route('home.page'))->with('success', 'Successfully Updated a Product!')
        : redirect()->back()->with('error', 'Oops!, Something is Wrong!');
    }

    public function store(ProductRequest $request)
    {
        $validated = $request->validated();
        $request->has('cover') ? $validated['cover'] = $this->service->storeImageCover($request->file('cover')) : '';
        $stored = $this->service->storeProduct($validated);

        return $stored
        ? redirect(route('home.page'))->with('success', 'Successfully Create a New Product!')
        : redirect()->back()->with('error', 'Oops!, Something is Wrong!');
    }

    public function destory($id)
    {
        $product = $this->service->getProductById($id);
        $destroyed = $this->service->deleteProductById($product->id);

        return $destroyed
        ? redirect(route('home.page'))->with('success', 'Successfully Delete a Product!')
        : redirect()->back()->with('error', 'Oops!, Something is Wrong!');
    }
}
