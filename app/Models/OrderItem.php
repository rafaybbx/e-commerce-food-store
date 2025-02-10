<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    // protected $fillable = ['name', 'price', 'quantity', 'image'];

    // public function order()
    // {
    //     return $this->belongsTo(Order::class, 'order_id', 'oid');
    // }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'product_id', 'pid');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    protected $fillable = ['order_id', 'product_id', 'quantity'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'pid');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'oid');
    }
}
