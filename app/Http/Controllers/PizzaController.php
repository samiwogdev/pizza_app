<?php

namespace App\Http\Controllers;
use App\Models\Pizza;
use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;

class PizzaController extends Controller
{
  public function index()
{
    // $all_pizzas = Pizza::get();
    $all_pizzas = Pizza::paginate(4);
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
        'small_pizza_price'=> $request->small_pizza_price,
        'medium_pizza_price'=> $request->medium_pizza_price,
        'large_pizza_price'=> $request->large_pizza_price,
        'category' => $request->category,
        'image' => $path,
    ]);
    return redirect()->route('pizza.index')->with('message','Pizza added successfully!');
}

public function edit($id)
{
    $single_pizza = Pizza::find($id);
    return view('pizza.edit', compact('single_pizza'));
}

public function update(PizzaUpdateRequest $request, $id)
{
    $pizza = Pizza::find($id);
    $path = ($request->has('image')) ? $request->image->store('public/pizza') : $pizza->image;
    // $pizza = new Pizza;
    $pizza->name = $request->name;
    $pizza->description = $request->description;
    $pizza->small_pizza_price = $request->small_pizza_price;
    $pizza->medium_pizza_price = $request->medium_pizza_price;
    $pizza->large_pizza_price = $request->large_pizza_price;
    $pizza->category = $request->category;
    $pizza->image = $path;
    $pizza->save();
    return redirect()->route('pizza.index')->with('message', 'Pizza Updated Succsessfully');
}

public function destroy($id)
{
Pizza::find($id)->delete();
return redirect()->route('pizza.index')->with('message', 'Pizza deleted successfully');
}
}
