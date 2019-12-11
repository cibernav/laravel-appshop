<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = auth()->user()->cart;
        $details = $cart->details;

        //dd($details[0]->product->categoryname);

        return view('home')->with(compact('details'));
    }
}
