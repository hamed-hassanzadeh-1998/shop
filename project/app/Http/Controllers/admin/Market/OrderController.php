<?php

namespace App\Http\Controllers\Admin\market;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function all()
    {
        return view('admin.market.order.index');
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
