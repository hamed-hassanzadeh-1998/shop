<?php

namespace App\Http\Controllers\Admin\market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all()
    {
        $orders=Order::all();
        return view('admin.market.order.index',compact('orders'));
    }
    public function newOrders()
    {
        //
    }
    public function sending()
    {
        //
    }
    public function unpaid()
    {
        //
    }
    public function canceled()
    {
        //
    }
    public function returned()
    {
        //
    }
    public function show()
    {
        //
    }
    public function changeSendStatus()
    {
        //
    }
    public function changeOrderStatus()
    {
        //
    }
    public function cancelOrder()
    {
        //
    }
}
