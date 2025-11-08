<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand', 'description', 'price', 'stock', 'image',
        'processor', 'ram', 'storage', 'camera', 'battery'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}