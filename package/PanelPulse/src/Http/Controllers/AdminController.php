<?php

namespace Kartikey\PanelPulse\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Kartikey\PanelPulse\Models\Order;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        // return view('PanelPulse::admin.home');

        $orders = Order::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->get();
        $todayOrders = Order::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->whereDate('created_at', Carbon::today())->get();
        $UnfulfillOrders = Order::whereIn('order_status', ['Reviewed', 'Shipped'])->get();
        // $checkouts = Checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->get();
        // $todayCheckouts = Checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->whereDate('created_at', Carbon::today())->get();

        return view('PanelPulse::admin.home', ['orders' => $orders, 'todayOrders' => $todayOrders,  'noOfUnfulfillOrders' => count($UnfulfillOrders)]); //'checkouts' => $checkouts, 'todayCheckouts' => $todayCheckouts,
    }
}
