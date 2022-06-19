<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopingCart extends Model
{
    use HasFactory;

    protected $table = 'shoping_carts';

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'status'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
