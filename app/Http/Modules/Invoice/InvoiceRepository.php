<?php

namespace App\http\Modules\Invoice;

use App\Models\Invoice;

class InvoiceRepository
{
    public function insertNewInvoice(String $userId, String $productId, String $totalPrice): Invoice
    {
        return Invoice::create([
            "user_id" => $userId,
            "product_id" => $productId,
            'totalPrice' => $totalPrice
        ]);
    }
}

?>