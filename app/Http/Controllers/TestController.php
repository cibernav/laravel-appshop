<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class TestController extends Controller
{
    //

    public function index(){

        $products = Product::paginate(15);

        return view('Test.index')->with(compact('products'));
    }
}
