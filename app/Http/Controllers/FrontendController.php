<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $pizzas = Pizza::latest()->get();
        return view('frontpage', compact('pizzas'));
    }
}
