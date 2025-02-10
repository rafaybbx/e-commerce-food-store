<?php

namespace App\Models;

// use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'oid';



    protected $table = 'orders';

    protected $fillable = ['price', 'shippingaddress', 'billingaddress','username','email','address','phnumber','cardholdername','cardnumber','cvv'];


    public function items()
    {
        return $this->hasMany(Orderitem::class, 'order_id', 'oid');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class, 'order_id', 'oid');
    // }
}
