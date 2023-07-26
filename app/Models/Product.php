<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $with = ['product_category'];

    protected $guarded = ['id '];

    protected $keyType = 'string';

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
