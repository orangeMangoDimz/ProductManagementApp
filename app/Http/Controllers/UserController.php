<?php

namespace App\Http\Controllers;

use App\http\Modules\Invoice\InvoiceService;
use App\http\Modules\Product\ProductService;
use App\http\Modules\User\UserService;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected ProductService $service;
    protected UserService $userService;
    protected InvoiceService $invoiceService;

    public function __construct(
        ProductService $service,
        UserService $userService,
        InvoiceService $invoiceService
    ) {
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
        if ($product->stock > $quantity) {
            $this->userService->addToCart($quantity, $product);
            return redirect(route('home.page'))->with('success', 'Successfully Added to Cart!');
        } else {
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
        return view('invoice.invoice');
    }

    public function storeCheckout()
    {
        $this->userService->addToInvoice();
        return redirect(route('home.page'))->with('success', 'Success Addedd to Invoice!');
    }

    public function invoice()
    {
        $invoices = $this->invoiceService->getAllInvoices();
        $products = [];
        foreach ($invoices as $invoice) {
            $idx = 0;
            // get detail information on product_id column in invoices table
            foreach (explode(',', $invoice->product_id) as $product_id)
                $products[$invoice->id][$idx++] = $this->service->getProductById($product_id);
            $idx = 0;
            // get buyed product quantity
            foreach (explode(',', $invoice->quantity) as $quantity)
                (int) $products[$invoice->id][$idx++]['stock'] = $quantity;
        }
        return view('invoice.list_invoice', compact('invoices', 'products'));
    }
}
