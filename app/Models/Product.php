<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'stok' => 'integer',
        'total_price' => 'integer',
        'harga' => 'integer',
        'jmlStok' => 'integer'
    ];
    protected $table = "products";
    protected $fillable = ['product_code', 'category_id', 'product_name', 'description', 'price', 'discount_amount', 'stock', 'image'];
}
