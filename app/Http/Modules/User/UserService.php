<?php
namespace App\http\Modules\User;

use App\http\Modules\Invoice\InvoiceService;
use App\http\Modules\Product\ProductService;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    protected UserRepository $repository;
    protected ProductService $productService;
    protected InvoiceService $invoiceService;

    public function __construct(UserRepository $repository, ProductService $productService, InvoiceService $invoiceService)
    {
        $this->repository = $repository;
        $this->productService = $productService;
        $this->invoiceService = $invoiceService;
    }

    public function login(array $data): bool
    {
        $credentials = [
            "email" => $data["email"],
            "password" => $data["password"]
        ];
        
        $remember = boolval($data["remember"] ?? 0);

        $succes = Auth::attempt($credentials, $remember);

        if ($succes) session()->regenerate();

        return $succes;
    }

    public function insertNewUser(array $data): User
    {
        return $this->repository->insertNewUser($data);
    }

    public function addToCart(String $quantity, Product $product): void
    {
        $id = $product->id;
        $cart = session()->get('cart', []);

        if (isset($cart[$id]))
        {
            $cart[$id]['quantity']++;
        }
        else
        {
            $cart[$id] = [
                'id' => $id,
                "cover" => $product->cover,
                "title" => $product->title,
                "category" => $product->product_category->name,
                "description" => $product->description,
                "quantity" => $quantity,
                "price" => $product->price
            ];
        }
        session()->put('cart', $cart);
    }

    public function deleteCartById(String $id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }

    public function addToInvoice()
    {
        $carts = session()->get('cart', []);
        $totalPrice = 0;
        $productId = array();
        $invoiceQuantity = array();
        $userId = Auth::user()->id;

        foreach($carts as $cart)
        {

            $id = $cart['id'];
            $cartQuantity = $cart['quantity'];
            $this->productService->deleteProductQuantity($id, $cartQuantity);

            $totalPrice += (int) $cart['price'] * (int) $cart['quantity'];
            array_push($productId, $id);
            array_push($invoiceQuantity, $cartQuantity);
            
            $this->deleteCartById($id);
        }
        $this->invoiceService->insertNewInvoice( $userId, $productId, $invoiceQuantity, (String) $totalPrice);

        // unset($cart);
        // session()->forget('cart');
    }

}
?>