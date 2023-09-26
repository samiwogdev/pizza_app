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

public function changeOrderStatus(Request $request, $id){
   Order::find($id);
   Order::where('id', $id)->update(['status' => $request->status]);
   return back();
}

public function store(Request $request){
if($request->small_pizza == 0 || $request->medium_pizza == 0 || $request->large_pizza == 0)
{
    return back()->with('errMessage', 'Please order at least one pizza');

}
if($request->small_pizza < 1 || $request->medium_pizza < 1 || $request->large_pizza < 1)
{
    return back()->with('errMessage', 'order should not be negative');
}

Order::create([
'user_id' => auth()->user()->id,
'date' => $request->date,
'time' => $request->time,
'pizza_id' => $request->pizza_id,
'small_pizza' => $request->small_pizza,
'medium_pizza' => $request->medium_pizza,
'large_pizza' => $request->large_pizza,
'description' => $request->desc,
'phone' => $request->phone

]);

return back()->with('message', 'Order added successful');
}


}
