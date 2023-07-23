<?php

namespace App\http\Modules\Invoice;

use App\Models\Invoice;

class InvoiceService
{
    protected InvoiceRepository $repository;

    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insertNewInvoice(String $userId, String $productId, String $totalPrice): Invoice
    {
        return $this->repository->insertNewInvoice( $userId, $productId, $totalPrice);
    }
}

?>