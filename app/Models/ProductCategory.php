<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    static public $productList = [
        'Jaket', 
        'Sepatu',
        'Ikat Pinggang',
        'Payung',
        'Mainan',
        'Mouse',
        'Keyboard',
        'Monitor',
        'Buku'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
