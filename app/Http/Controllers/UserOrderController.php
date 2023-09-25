<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
  public function index(){
    $orders = Order::orderBy('id','DESC')->get();
    return view('order.index', compact('orders'));
  }
}
