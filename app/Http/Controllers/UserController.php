<?php

namespace App\Http\Controllers;

use App\http\Modules\Invoice\InvoiceService;
use App\http\Modules\Product\ProductService;
use App\http\Modules\User\UserService;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    protected ProductService $service;
    protected UserService $userService;
    protected InvoiceService $invoiceService;

    public function __construct(
        ProductService $service, 
        UserService $userService,
         InvoiceService $invoiceService
         )
    {
        $this->service = $service;
        $this->userService = $userService;
        $this->invoiceService = $invoiceService;
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
        $this->userService->addToInvoice();
        $userId = auth()->user()->id;
        $invoice = $this->invoiceService->getCurrentInvoice($userId);
        $idx = 0;

        // get detail information on product_id column in invoices table
        foreach ( explode(',' , $invoice->product_id) as $product_id)
        {
            $products[$idx++] = $this->service->getProductById($product_id);
        }
        
        // get buyed product quantity
        $idx = 0;
        foreach ( explode(',' , $invoice->quantity) as $quantity)
        {
            (int) $products[$idx++]['stock'] = $quantity;
        }   

        // foreach($products as $product)
        // {
        //     echo $product['stock'] . '<br>';
        // }
        // $products = Product::all();
        return view('invoice.invoice', compact(['invoice', 'products']));
    }
}
