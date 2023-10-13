<?php

namespace Kartikey\PanelPulse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orders_customers()
    {
        return $this->belongsTo(OrdersCustomer::class, 'id', 'orders_id');
    }

    public function orders_items()
    {
        return $this->belongsTo(OrdersItem::class, 'id', 'orders_id');
    }
    // public function customer_shipping()
    // {
    //     return $this->hasManyThrough(
    //         Shipping::class,
    //         OrdersCustomer::class,
    //         'orders_id', // Foreign key on OrdersCustomers table
    //         'country', // Foreign key on Shipping table
    //         'id', // Local key on this model (Order)
    //         'shipping_country' // Local key on OrdersCustomers
    //     );
    // }
}
