<?php

namespace App\http\Modules\Invoice;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Invoice;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceRepository
{
    public function insertNewInvoice(String $userId, array $productId, array $invoiceQuantity, String $totalPrice): Invoice
    {
        return Invoice::create([
            "user_id" => $userId,
            "product_id" => implode(',' , $productId),
            'quantity' => implode(',' , $invoiceQuantity),
            'totalPrice' => $totalPrice
        ]);
    }

    public function getAllInvoices(): LengthAwarePaginator
    {
        return Invoice::paginate(1);
    }
}

?>