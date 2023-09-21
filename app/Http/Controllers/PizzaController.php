<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaStoreRequest;

class PizzaController extends Controller
{
  public function index()
{
    $all_pizzas = Pizza::get();
    return view('pizza.index', compact('all_pizzas'));
}

public function create(){
 return view('pizza.create');
}

public function store(PizzaStoreRequest $request)
{
    $path = $request->image->store('public/pizza');
    Pizza::create([
        'name' => $request->name,
        'description' => $request->description,
        'small_pizza_price' => $request->small_pizza_price,
        'medium_pizza_price' => $request->medium_pizza_price,
        'large_pizza_price' => $request->large_pizza_price,
        'category' => $request->category,
        'image' => $path
    ]);
    $all_pizzas = Pizza::get();
    return view('pizza.index', compact('all_pizzas'));
}
}
