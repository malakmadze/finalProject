<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use function view;

class OrderController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $orders = Order::where('orders.status', 1)->get();
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order){
        return view('auth.orders.show', compact('order'));
    }
}
