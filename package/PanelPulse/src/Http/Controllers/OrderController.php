<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;
use Kartikey\PanelPulse\Models\OrdersCustomer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Kartikey\PanelPulse\Models\Order;
use Kartikey\PanelPulse\Models\OrdersItem;
use Kartikey\PanelPulse\Models\Shipping;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'orders_customers:id,orders_id,first_name,last_name',
            'orders_items:id,orders_id,product_quantity',
            // 'customer_shipping'
        ])->orderBy('id', 'desc')->get();

        $orders = $orders->groupBy('id');
        // dd($orders->toarray());
        return view('PanelPulse::admin.orders.list', ['orders' => $orders]); //'checkouts' => $checkouts, 'todayCheckouts' => $todayCheckouts,
    }

    public function order($orderID)
    {
        $orders = Order::where('id', $orderID)->first();
        $orders_customers = OrdersCustomer::where('orders_id', $orders->id)->orderBy('id', 'desc')->first();
        $orders_items = OrdersItem::where('orders_id', $orders->id)->get();

        $shippings = Shipping::where('country', $orders_customers['shipping_country'])->orderBy('state', 'asc')->get();
        return view('PanelPulse::admin.orders.detail', ['orders' => $orders, 'orders_customers' => $orders_customers, 'orders_items' => $orders_items, 'shippings' => $shippings]);
    }
}
