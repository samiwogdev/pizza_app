<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\PizzaStoreRequest;

class PizzaController extends Controller
{
  public function index()
{
    return view('pizza.index');
}

public function create(){
 return view('pizza.create');
}

public function store(PizzaStoreRequest $request)
{

}
}
