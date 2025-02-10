<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\OrderItem;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'pid';
    protected $table = 'products';
    protected $fillable = ['name', 'price_per_kg', 'quantity_per_kg', 'img'];


    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'pid');
    }
}
