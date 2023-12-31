<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    public $with = ['user'];

    public $casts = [
        'product_id' => 'array',
        'quantity' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id');
    // }
}
