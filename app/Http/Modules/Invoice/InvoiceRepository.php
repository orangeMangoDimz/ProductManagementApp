<?php

namespace App\http\Modules\Invoice;

use App\Models\Invoice;

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

    public function getCurrentInvoice(String $userId): Invoice
    {
        return Invoice::where('user_id', $userId)->orderBy('created_at', 'DESC')->first();
    }
}

?>