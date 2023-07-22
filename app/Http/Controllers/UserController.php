<?php

namespace App\Http\Controllers;

use App\http\Modules\Product\ProductService;
use App\http\Modules\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected ProductService $service;
    protected UserService $userService;

    public function __construct(ProductService $service, UserService $userService)
    {
        $this->service = $service;
        $this->userService = $userService;
    }

    public function cart()
    {
        return view('product.shoping_cart');
    }

    public function store($id)
    {
        $product = $this->service->getProductById($id);
        $this->userService->addToCart($product);
        return redirect(route('home.page'))->with('success', 'Successfully Added to Cart!');
    }

    public function destroy()
    {
        
    }
}
