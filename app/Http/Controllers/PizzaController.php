<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Http\Requests\PizzaUpdateRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $all_pizzas = Pizza::get();
          $all_pizzas = Pizza::paginate(5);
       return view('pizzafolder.index', compact('all_pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pizzafolder.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single_pizza = Pizza::find($id);
        return view('pizzafolder.edit', compact('single_pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaUpdateRequest $request, $id)
    {
         $single_pizza = Pizza::find($id);
        if($request->has('image')){
            $path = $request->image->store('public/pizza');
        }else{
           $path =  $single_pizza->image;
        }
        $pizza = new Pizza; 
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_pizza_price = $request->small_pizza_price;
        $pizza->medium_pizza_price = $request->medium_pizza_price;
        $pizza->large_pizza_price = $request->large_pizza_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->save();
        return redirect()->route('pizza.index')->with('message','Pizza update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::find($id)->delete();
        return redirect()->route('pizza.index')->with('message','Pizza deleted successfully!');

    }
}
