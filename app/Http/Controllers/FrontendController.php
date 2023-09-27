<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        if(!$request->category){
        $pizzas = Pizza::latest()->get();
        return view('frontpage', compact('pizzas'));
        }

        $pizzas = Pizza::where('category', $request->category)->get();
        return view('frontpage', compact('pizzas'));

    }

    public function show($id){
        $pizza = Pizza::find($id);
        return view('show', compact('pizza'));
    }
}
