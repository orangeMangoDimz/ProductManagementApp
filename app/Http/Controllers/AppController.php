<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\ProductService;

class AppController extends Controller
{

    protected ProductService $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        if (!auth()->check()) return view('auth.login');
        $products = $this->service->getAllProducts();
        return view('app.index', compact('products'));
    }
}
