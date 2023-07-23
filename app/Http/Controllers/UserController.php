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

    public function store(Request $request, $id)
    {
        $product = $this->service->getProductById($id);
        $quantity = $request['quantity'];
        if ($product->stock > $quantity)
        {
            $this->userService->addToCart($quantity, $product);
            return redirect(route('home.page'))->with('success', 'Successfully Added to Cart!');
        }
        else
        {
            return redirect()->back()->with('error', 'Oops, Product Stock is not Enough!');
        }
    }

    public function destroy($id)
    {
        $this->userService->deleteCartById($id);
        return redirect()->back();
    }

    public function checkout()
    {
        $invoices = $this->userService->addToInvoice();
        print_r($invoices);
        // return view('invoice.invoice');
    }
}
