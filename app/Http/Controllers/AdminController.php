<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('admin.home');
        // $orders = Orders::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->get();
        // $todayOrders = Orders::selectRaw('COUNT(id) AS noOfOrders, SUM(total_amount) AS totalSales')->whereDate('created_at', Carbon::today())->get();
        // $checkouts = Checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->get();
        // $todayCheckouts = Checkouts::selectRaw('COUNT(id) AS noOfCheckouts, SUM(total) AS totalCheckouts')->whereDate('created_at', Carbon::today())->get();
        // $UnfulfillOrders = Orders::whereIn('order_status', ['Reviewed', 'Shipped'])->get();

        // return view('admin.home', ['orders'=>$orders ,'todayOrders'=>$todayOrders,'checkouts'=>$checkouts ,'todayCheckouts'=>$todayCheckouts, 'noOfUnfulfillOrders'=>count($UnfulfillOrders)]);
    }
}
